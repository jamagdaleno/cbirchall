<?php

    // if (isset($_GET["price"]) && ($_GET["downPayment"]) && ($_GET["rate"]=="30")) {
    

    function msg() 
    {
        $price = $_GET['price'];
        $rate  = $_GET['rate'];
        $income  = $_GET['income'];
        $debt  = $_GET['debt'];
        $downPayment = $_GET["downPayment"]; // set value to $downPayment
         
        $loanAmount = $price - $downPayment; // subtracts purchase price of home from down payment to get a loan amount
        
        if (!isset($price)) 
        { // message for when user lands on the page
           
            echo "<strong>Please enter your information.</strong>"; // default message
            
        }
    
        // if any form input is missing
        else if (empty($price) || empty($rate) || empty($income) || empty($debt)) 
        {  
            // error msg
            echo "<strong style='color:red'>ERROR: Please type in all of the following information.</strong><br>";
            
        }
        
        else 
        {
                if ($rate == 30) 
                { // if 30-yr interest rate is selected
                
                    $percentPerYear = 0.04 / 12; // (4/100) = 4% or .04
                    $yearOverMonth = -30 * 12; // -360 months
                
                    $totalPayment = equation($percentPerYear, $yearOverMonth, $loanAmount);
                }
            
                else if ($rate == 15) 
                {
                
                    $percentPerYear = 0.0375 / 12; // 3.75 interest rate
                    $yearOverMonth = -15 * 12; // -180 months
                    
                    $totalPayment = equation($percentPerYear, $yearOverMonth, $loanAmount);
                
                }
            
                echo "<br />Your monthly mortgage payment would be: <strong>$" . $totalPayment . "</strong><br />";
            
                if (isset($_GET['income']) && isset($_GET['debt'])) 
                { // fix for variables
                    
                    $monthlyIncome = ($income / 12) * .36; // divides annual income by 12 mo, multiplies monthly by 36% to see maximum loan amount
                    
                    $totalAvailable = round($monthlyIncome - $debt); // subtract monthly debt from income, round num
                    
                    echo "<br />Your current net available is: <strong>$" . $totalAvailable . "</strong><br />";
                    
                    if ($totalAvailable < $totalPayment) // if users budget is LESS than total payment
                    {
                        echo "<p><strong style='color:red'><br />Based on the information provided, you CANNOT afford the house</strong></p>";
                        
                    }
                    
                    else // if users budget is GREATER
                    {
                         echo "<p><strong style='color:green'><br />Based on the information provided, you CAN afford the house</strong></p>"; 
                    }
                    
                } // if isset income and isset debt 
            
        } // main Else
        
            
    } // End Function
    
    
    function equation($rate, $month, $loan) 
    {
        
        // formula found on Wikipedia: https://en.wikipedia.org/wiki/Mortgage_calculator
        
        $priceOverYear = $rate * $loan; // $rate = priceOverYear,  $loan = loanAmount
        
        $secondPortion  = 1 - (pow((1 + $rate), $month));  // 1 - ( 1 + .04) ^ -360 // month = yearOverMonth
        
        $totalPayment = round($priceOverYear / $secondPortion); 
        
        return $totalPayment; // must return value
        
    } //end Function
    
?>