<?php

    // if (isset($_GET["price"]) && ($_GET["downPayment"]) && ($_GET["rate"]=="30")) {
    
    $globePrice = $_GET['price'];
    $globeRate  = $_GET['rate'];
    $globeIncome  = $_GET['income'];
    $globeDebt  = $_GET['debt'];
    

    function msg() 
    {
         global $globePrice, $globeRate, $globeIncome, $globeDebt;
         
         $purchasePrice = $_GET["price"]; // set value to $purchasePrice
         $downPayment = $_GET["downPayment"]; // set value to $downPayment
         
         $annualIncome = $_GET['income'];
         $monthlyDebt = $_GET['debt'];
         
         $loanAmount = $purchasePrice - $downPayment; // subtracts purchase price of home from down payment to get a loan amount
         
         
         //equation(); // calling function 
        
        if (!isset($globePrice)) 
        { // message for when user lands on the page
           
            echo "<strong>Please enter your information.</strong>"; // default message
            
        } // end of if !isset 
    
        // if any form input is missing
        else if (empty($globePrice) || empty($globeRate) || empty($globeIncome) || empty($globeDebt)) 
        {  
            // error msg
            echo "<strong style='color:red'>ERROR: Please type in all of the following information.</strong><br>";
            
        }  // end of else if (check empty)
        
        else 
        {
                /*
                $purchasePrice = $_GET["price"]; // set value to $purchasePrice
                $downPayment = $_GET["downPayment"]; // set value to $downPayment
                
                $loanAmount = $purchasePrice - $downPayment; // subtracts purchase price of home from down payment to get a loan amount
                */
            
                if ($globeRate == 30) 
                { // if 30-yr selected
                
                    $percentPerYear = 0.04 / 12; // (4/100) = 4% or .04
                    $yearOverMonth = -30 * 12; // -360 months
                
                    $totalPayment = equation($percentPerYear, $yearOverMonth, $loanAmount);
                
                    /*
                    $priceOverYear = $percentPerYear * $loanAmount;
                    $secondPortion  = 1 - (pow((1 + $percentPerYear), $yearOverMonth));  // 1 - ( 1 + .04) ^ -360
                    $totalPayment = round($priceOverYear / $secondPortion);
             
                    */
           
                }   // if (globeRate == 30)
            
                else if ($globeRate == 15) 
                {
                
                    $percentPerYear = 0.0375 / 12; // 3.75 interest rate
                    $yearOverMonth = -15 * 12; // -180 months
                    
                     $totalPayment = equation($percentPerYear, $yearOverMonth, $loanAmount);
                    
                    /*
                    $priceOverYear = $percentPerYear * $loanAmount;
                    $secondPortion  = 1 - (pow((1 + $percentPerYear), $yearOverMonth));  // 1 - ( 1 + .04) ^ -360
                    $totalPayment = round($priceOverYear / $secondPortion);
                    */
                
                } // if else (globeRate == 30)
            
                echo "<br />Your monthly mortgage payment would be: <strong>$" . $totalPayment . "</strong><br />";
                /*
                $annualIncome = $_GET['income'];
                $monthlyDebt = $_GET['debt'];
                */
            
                if (isset($_GET['income']) && isset($_GET['debt'])) 
                { // fix for variables
                    
                    $monthlyIncome = ($annualIncome / 12) * .36;
                    
                    $totalAvailable = round($monthlyIncome - $monthlyDebt);
                    
                    echo "<br />Your current net available is: <strong>$" . $totalAvailable . "</strong><br />";
                    
                    if ($totalAvailable < $totalPayment) 
                    {
                        echo "<p><strong style='color:red'><br />Based on the information provided, you CANNOT afford the house</strong></p>";
                        
                    } //  outer If (total available < total pay)
                    
                    else 
                    {
                         echo "<p><strong style='color:green'><br />Based on the information provided, you CAN afford the house</strong></p>"; 
                    } // inner Else 
                    
                    
                } // if isset income and isset debt 
            
        } // main Else
        
            
    } // End Function
    
    
    function equation($rate, $month, $loan) 
    {
         //global $globePrice;
         //global $globeRate;
        
        //$printArray = print_r($globePrice);
        //echo $printArray;
        
        /*
         $percentPerYear = 0.04 / 12; // (4/100) = 4% or .04
                $yearOverMonth = -30 * 12; // -360 months
                
                $totalPayment = equation($percentPerYear, $yearOverMonth, $loanAmount );
                
                /*
                $priceOverYear = $percentPerYear * $loanAmount;
                $secondPortion  = 1 - (pow((1 + $percentPerYear), $yearOverMonth));  // 1 - ( 1 + .04) ^ -360
                $totalPayment = round($priceOverYear / $secondPortion);
                */
        
        
        $priceOverYear = $rate * $loan; // rate = priceOverYear loan = loanAmount
        
        $secondPortion  = 1 - (pow((1 + $rate), $month));  // 1 - ( 1 + .04) ^ -360 // month = yearOverMonth
        
        $totalPayment = round($priceOverYear / $secondPortion);
        
        return $totalPayment; // must return value
        
    } //end Function
    
?>