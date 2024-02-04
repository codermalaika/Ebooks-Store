<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>E-Book | About Us</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS File Link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'header.php'; ?>

   <!-- About Us Code Start -->
<div class="about-heading">
   <h3>About Us</h3>
   <p> <a href="home.php">Home</a> / About Us</p>
</div>

<section class="about-details">
   <div class="about-flex">
      <div class="about-image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="about-content">
         <h3>Reasons To Pick Us?</h3>
         <p>Discover your next great read with us. Extensive genre diversity, user-friendly interface, competitive prices, and responsive support make us your top ebook destination.</p>
         <p>Choose us for an exceptional reading experience. Our vast genre selection, user-friendly interface, competitive prices, and responsive support make us your premier ebook destination.</p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>
   </div>
</section>

   <!-- Reviews Code Start -->
<section class="reviews-details">
   <h1 class="main-title"></h1>
   <div class="box-container">
      <div class="box">
         <img src="images/pic-1.png" alt="">
         <h3>Mark Edward</h3>
         <p>"Outstanding ebook store! Extensive collection, user-friendly interface, competitive prices, and excellent customer service. Highly recommended for all book enthusiasts."</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <h3>Grace Walker</h3>
         <p>"An exceptional ebook store with a vast selection, easy navigation, and excellent service. My favorite destination for quality reading material."</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <h3>William Brown</h3>
         <p>"Fantastic ebook shop! Great variety, user-friendly platform, affordable rates, and excellent support. Highly recommended for book lovers. A must-visit!"</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <h3>Lily Lewis</h3>
         <p>"Top-notch ebook store! Diverse books, seamless experience, reasonable prices, and responsive support. Perfect for avid readers like me. Highly recommended!"</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <h3>Tyler Baker</h3>
         <p>"Exceptional ebook platform! Wide selection, intuitive interface, competitive prices, and superb customer support. A haven for book enthusiasts. Highly endorsed!"</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <h3>Emma Johnson</h3>
         <p>"Exceptional ebook source! Rich content, user-friendly, affordable, with excellent service. A haven for passionate readers. My first choice for books."</p>
         <div class="review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>
   </div>
</section>

   <!-- Authors Code Start -->
<section class="authors-details">
   <h1 class="main-title">Inspirational Authors</h1>
   <div class="box-container">
      <div class="box">
         <a href="henry.php"><img src="images/author-1.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Henry James</h3>
      </div>

      <div class="box">
         <a href="george.php"><img src="images/author-2.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>George R.R. Martin</h3>
      </div>

      <div class="box">
         <a href="emily.php"><img src="images/author-3.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Emily Brontë</h3>
      </div>

      <div class="box">
         <a href="well.php"><img src="images/author-4.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>H.G. Wells</h3>
      </div>

      <div class="box">
         <a href="alice.php"><img src="images/author-5.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Alice Walker</h3>
      </div>

      <div class="box">
         <a href="sylvia.php"><img src="images/author-6.jpg" alt=""></a>
         <div class="author-share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Sylvia Plath</h3>
      </div>
   </div>
</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>