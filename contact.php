<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- CSS File Link -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- Contact Form Code Start -->
<div class="contact-heading">
   <h3>Contact Us</h3>
   <p> <a href="home.php">Home</a> / Contact </p>
</div>

<section class="contact-details">
   <div class="contact">
      <div class="contact-content">
      <form action="" method="post">
      <h3>Share Your Thoughts!</h3>
      <div class="inputBox">
      <input type="text" name="name" required class="box">
      <i>Enter your Name</i>
      </div>

      <div class="inputBox">
      <input type="email" name="email" required class="box">
      <i>Enter your Email</i>
      </div>

      <div class="inputBox">
      <input type="number" name="number" required class="box">
      <i>Enter your Number</i>
      </div>

      <div class="inputBox">
      <textarea name="message" class="box" id="" cols="30" rows="10" required></textarea>
      <i>Enter your Message</i>
      </div>

      <input type="submit" value="send message" name="send" class="btn">
      </div>
   </div>
   </form>
</section>


<?php include 'footer.php'; ?>

<!-- JS File Link  -->
<script src="js/script.js"></script>

</body>
</html>