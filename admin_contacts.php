<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel | Messages</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Admin CSS File Link -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
<?php include 'admin_header.php'; ?>

<!-- Admin Panel Messages Code Start -->
<div class="messages-heading">
   <h3>Messages</h3>
   <p> <a href="admin_page.php">Home</a> / Messages</p>
</div>
<section class="messages-details">
   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p> User ID : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> Name : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p> Number : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> Message : <span><?php echo $fetch_message['message']; ?></span> </p>
      <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('Delete This Message?');" class="delete-btn">Delete Message</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">No New Messages...!</p>';
   }
   ?>
   </div>
</section>


<!-- Admin JS File Link  -->
<script src="js/admin_script.js"></script>

</body>
</html>