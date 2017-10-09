<?php

    
    // Mortgage Formula Equation found: https://en.wikipedia.org/wiki/Mortgage_calculator
    
    $varPrice = isset($_GET["price"]); 

    if (isset($_GET["price"]) && ($_GET["downPayment"]) && ($_GET["rate"]=="30")) {
    // if price, payment, and 30-fixed-rate was selected
    
        
        $purchasePrice = $_GET["price"];
        $downPayment = $_GET["downPayment"];
        
        $priceDownSub = $purchasePrice - $downPayment; // subtracts Purchase Price from Down Payment to get loan amount
        
        
        // applies 30-year interest rate at 4% to leftover loan amount
        //$totalPayment = ( (4/100/12) * $priceDownSub) / (1- ( (1+(4/100/12) ) ^(-30*12) ) ); // ^ exponent does not work
        
        
        $percentPerYear = 0.04 / 12; // (4/100) = 4% or .04
        
        $priceOverYear = $percentPerYear * $priceDownSub; // (.04 * $priceDownSub)
        
        $yearOverMonth = -30 * 12; // -360 months
        
        $secondPortion  = 1 - (pow((1 + $percentPerYear), $yearOverMonth));  // 1 - ( 1 + .0033e3) ^ -360
        
        // adding +1 to monthly interest rate (.0033) (1.003% ^ -360)-1
        
        //$base = 1 - (1 + (4 / 100 / 12));
        //$expo =  (-30 * 12);
        
        //$powExpo = pow($base, $expo);
        
        $totalPayment = round($priceOverYear / $secondPortion);
        
        //echo $priceOverYear .'<br />';
        //echo $monthPow .'<br />';
        //echo $powExpo .'<br />';
        
        
        echo "Your total monthly payment is $" . $totalPayment;
        
    }
    
    if (isset($_GET["income"]) && ($_GET["debt"])) {
        
        $annualIncome = $_GET["income"] / 12;
        $monthlyDebt = $_GET["debt"];
        
        $leftOverMoney = round($annualIncome - $monthlyDebt);
        
        echo "Leftover money is: $" . $leftOverMoney;
        
        if ($totalPayment > $leftOverMoney) {
            echo "Message: Based on the information provided, you cannot afford this house";
        }
        else {
            echo "Yes you can";
        }
        
    }


    // if price, payment, and 15-yr rate selected


    // if nothing is selected
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Calculator </title>
    </head>
    <body style="margin: auto; width: 850px; text-align: center;">
        
        <h2>House Payment Calculator</h2>
        
        <form method="GET">
            
            <input type="text" name="price" placeholder="Purchase Price" /> <br />
            
            <select name="downPayment">
                <option>Down Payment</option>
                <option>20000</option>
                <option>40000</option>
                <option>60000</option>
                <option>80000</option>
                <option>100000</option>
            </select> <br /><br /><br />
            
            <input id="rate30" type="radio" name="rate" value="30" />
            <label for="rate30">30-year fixed (4.0%)</label>
            
            <input id="rate15" type="radio" name="rate" value="15" />
            <label for="rate15">15-year fixed (3.75%)</label> <br /> <br />
            
            <h2>How much can I afford?</h2>
            
            Enter your annual income: <input type="text" name="income" placeholder="Income" /> <br />
            Enter your monthly debts: <input type="text" name="debt" placeholder="Debts" /> <br />
            
            <input type="submit" name="Submit" />
        </form>
        
        <?php
            if (!isset($_GET["price"])) {
                echo "enter house price";
            }
            else {
                if (empty($_GET["price"]) && ($_GET["downPayment"])) {
                    echo "please enter information";
                }
            }
        ?>
        
    </body>
</html>