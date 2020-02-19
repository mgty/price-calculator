<?php
    // get the data from the form
   $description = filter_input(INPUT_POST, 'description');
    $unit_price = filter_input(INPUT_POST, 'unit_price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    
    // validate price 
   if ( $unit_price === FALSE )  {              #if unit price is empty
        $error_message = 'Price must be a valid number.'; 
    } else if ( $unit_price <= 0 ) {
        $error_message = 'Price must be a valid number.'; 
        
    // validate quantity
    } else if ( $quantity === FALSE ) {         #quantity unit price is empty
        $error_message = 'Quantity must be a valid number.';
    } else if ( $quantity <= 0 ) {
        $error_message = 'Quantity must be a valid number.';
    } else {
        $error_message = ''; 
    }
    

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit(); 
    }

     // calculate the sub total, sales tax and total
    $sub_total = $unit_price * $quantity;
    $sales_tax = $sub_total * .07; 
    $total = $sub_total + $sales_tax;
  


    // apply currency and percent formatting  
    $unit_price_f = "$".number_format($unit_price, 2);
    $quantity_f = number_format($quantity, 0);
    $sub_total_f ='$'.number_format($sub_total, 2);
    $sales_tax_f ='$'.number_format($sales_tax, 2);
    $total_f ='$'.number_format($total, 2);
?>
<!DOCTYPE html>
<html>
<head>
   
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        
       
        <h1>Checkout  <?php
               //Set the current date with the header
            $today = date('m/d/Y');
            echo "$today <br />"; 
         ?></h1>
        
        <label>Item Description:</label>
        <span><?php echo htmlspecialchars($description); ?></span>
        <br>

        <label>Price:</label>
        <span><?php echo $unit_price_f; ?></span><br>

        <label>Quantity:</label>
        <span><?php echo $quantity_f; ?></span><br>

        <label>Sub Total:</label>
        <span><?php echo $sub_total_f; ?></span><br>
        
        <label>Sales Tax:</label>
        <span><?php echo $sales_tax_f; ?></span><br>
        
        <label>Total:</label>
        <span><?php echo $total_f; ?></span><br>
    </main>
</body>
</html>
