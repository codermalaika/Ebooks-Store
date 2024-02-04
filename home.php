<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['item_name'];
   $product_price = $_POST['item_price'];
   $product_image = $_POST['item_image'];
   $product_quantity = $_POST['item_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Book | Home</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS File Link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php include 'header.php'; ?>

   <!-- HomePage Code Start -->
<section class="home-details">
   <div class="home-content">
      <h3>UNLOCK THE WORLD OF KNOWLEDGE</h3>
      <p>Explore, Immerse, and Expand Your Horizons With Our E-Book Store!</p>
      <a href="about.php" class="explore-btn">Explore More</a>
   </div>
</section>

<section class="latest-products">
   <h1 class="main-title">Latest Products</h1>
   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="inventory_uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="item_quantity" value="1" class="qty">
      <input type="hidden" name="item_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="item_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="item_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="Add To Cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">No items in the cart ...</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">Load More</a>
   </div>
</section>

      <!-- Home About Section Code Start -->
<section class="about-details">
   <div class="about-flex">
      <div class="about-image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="about-content">
         <h3>About Us</h3>
         <p>"Discover the heart and soul of literature at our E-Book Store. We're your passport to a digital realm teeming with captivating ebooks from every genre. Our platform boasts user-friendliness, irresistible pricing, and a responsive support team. Join our community of literary enthusiasts and let your reading journey flourish with us!"</p>
         <a href="about.php" class="btn">Read More</a>
      </div>
   </div>
</section>

      <!-- Home Contact Section Code Start -->
<section class="home-contact">
   <div class="contact-content">
      <h3>HAVE ANY QUERIES?</h3>
      <p>"We're here to help! Feel free to reach out for assistance or any inquiries. Your satisfaction is our priority."</p>
      <a href="contact.php" class="explore-btn">Contact Us</a>
   </div>
</section>




      <!-- Footer Code Start -->
<?php include 'footer.php'; ?>

<!-- JavaScript Link -->
<script src="js/script.js"></script>

</body>
</html>