<?php
    // get the data from the form
    $description = filter_input(INPUT_POST, 'description');
    $unit_price = filter_input(INPUT_POST, 'unit_price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'unit_price', FILTER_VALIDATE_INT);
    
    // validate price
   if ($unit_price === FALSE){          #if unit price is empty
    $error_message = "Price must be a valid number";
   } else if ($unit_price <0){
    $error_message = "Price must be more than 0";
   }
    
   //validate quantity
   else if ($quantity === FALSE){       #if quantity price is empty
    $error_message = "Quantity must be a valid number";
   }else if($quantity <0) {
    $error_message = "Quantity must be more than 0";
   } else {
    $error_message = ''; 
   }


    // if an error message exists, go to the index page
    
     // calculate the sub total, sales tax and total
    
  


    // apply currency and percent formatting  
    
?>
