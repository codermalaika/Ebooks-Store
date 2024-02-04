<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['order_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. ' . $_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code']);
    $placed_on = date('d-M-Y');

    $cart_total = 0;
    $cart_products = [];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($cart_query) > 0) {
        while ($cart_item = mysqli_fetch_assoc($cart_query)) {
            $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;

            // Calculate the product quantity for each item
            $product_quantity = $cart_item['quantity'];
        }
    }

    $total_products = implode(', ', $cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if ($cart_total == 0) {
        $message[] = 'Your Cart Is Empty';
    } else {
        if (mysqli_num_rows($order_query) > 0) {
            $message[] = 'Order Already Placed!';
        } else {
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
            $message[] = 'Order Placed Successfully! Check Your Email for PDF Books Password';

            // Send email notification
            $to = $email;
            $subject = 'Order Confirmation';
            $email_message = 'Your order has been placed successfully. Thank you for shopping with us. HERE IS YOUR PDF PASSWORD ebooks0321987654_pdf';
            $headers = 'From: malaikaaptech2.0@gmail.com'; // Replace with your email address
            mail($to, $subject, $email_message, $headers);

            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Book | PDf Books Checkout</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS File Link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'header.php'; ?>

<!-- PDF Checkout Form Code Start -->
<div class="pdf-checkout-heading">
   <h3>PDF Books CheckOut</h3>
   <p> <a href="home.php">Home</a> / PDF Books CheckOut </p>
</div>

   <!-- Displaying Orders Code Start -->
<section class="display-order-details">
   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">There Is No Item In Your Cart ...</p>';
   }
   ?>
   <div class="grand-total-details"> Total Bill : <span>$<?php echo $grand_total; ?>/-</span> </div>
</section>

   <!-- PDF CheckOut Code Start -->
<section class="checkout-details">
   <form action="" method="post">
      <h3>Confirm Your Order</h3>
      <div class="checkout-flex">
         <div class="inputBox">
            <span>Your Full Name :</span>
            <input type="text" name="name" required placeholder="Enter your full name">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" required placeholder="Enter your number">
         </div>
         <div class="inputBox">
            <span>Your Email Address :</span>
            <input type="email" name="email" required placeholder="Enter your email address">
         </div>
         <div class="inputBox">
            <span>Payment Method :</span>
            <select name="method">
               <option value="jazzcash">Jazz Cash</option>
               <option value="paypal">Payoneer</option>
               <option value="easypaisa">EasyPaisa</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address :</span>
            <input type="number" min="0" name="flat" required placeholder="Enter your flat or house no.">
         </div>
         <div class="inputBox">
            <span>Street Name :</span>
            <input type="text" name="street" required placeholder="Enter your street name">
         </div>
         <div class="inputBox">
            <span>Your City :</span>
            <input type="text" name="city" required placeholder="Enter your city name">
         </div>
         <div class="inputBox">
            <span>Your State :</span>
            <input type="text" name="state" required placeholder="Enter your state name">
         </div>
         <div class="inputBox">
            <span>Your Country :</span>
            <input type="text" name="country" required placeholder="Enter your country name">
         </div>
         <div class="inputBox">
            <span>Postal Code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="Enter your postal code">
         </div>
      </div>
      <a href="orders.php"><input type="submit" value="Place Order Now" class="btn" name="order_btn"></a>
   </form>
</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>