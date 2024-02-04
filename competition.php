<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESSAY COMPETITION</title>
    <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- CSS File Link  -->
    <link rel="stylesheet" href="css/style4.css">

</head>
<body>
<div class="competition-heading">
   <h3 class="competition">EBooks Writing Competition</h3>
   <p class="competition-content"> <a href="home.php" class="competiton-home">Home</a> / EBooks Competition </p>
</div><br><br>
    <h1 class="ebooks">
        <em >EBOOKS</em>
        <span><b aria-hidden="true"><i>~</i><i>~</i><i>~</i></b> COMPETITION <b aria-hidden="true"><i>~</i><i>~</i><i>~</i></b></span>
      </h1>
      <div class="content">
        <p style="color: azure;" class="h1-content">In an age characterized by rapid technological advancements and digital connectivity, the written word continues to hold an enduring power that transcends time and space. The "Power of Words" Essay Competition is a call to all individuals who recognize the immense potential embedded within language—a potential to educate, illuminate, persuade, and incite change. This competition is a testament to the fact that amidst the ever-evolving landscape of communication, the art of essay writing remains a potent vehicle for the exchange of ideas, the preservation of cultural narratives, and the exploration of the human experience.&hellip;</p>
        <p  class="h1-content">The <em>"Power of Words"</em>  Essay Competition is not merely an intellectual exercise; it is a celebration of creativity, diversity, and depth of thought. We encourage participants to take their pens as brushes and the blank page as a canvas, to craft narratives that resonate with authenticity and passion. Your essay is your unique brushstroke on the canvas of human expression, contributing to the rich tapestry of collective knowledge and experience.</p>
        <p  class="h1-content">Throughout history, we have witnessed how the eloquence of the written word has catalyzed revolutions, driven social reform, and kindled the flames of imagination. From the manifestos that ignited independence movements to the novels that have touched hearts across generations, essays and written discourse have been pivotal in shaping our world. </p>
        <p  class="h1-content">At the heart of this competition is the belief that the written word is more than just a means of expression; it is a force for transformation. Essays have the power to educate, to challenge, and to bridge divides. They can awaken empathy and ignite action, making the invisible visible and the complex comprehensible. </p>
        <br>
        <h2 class="ebooks2">OBJECTIVE</h2>
        <ul style="color: azure;" class="points">
          <li>The primary objective of this competition is to encourage individuals to engage in thoughtful, well-researched, and creative essay writing. Participants are invited to explore the transformative potential of words and their ability to bring about change, raise awareness, and inspire action. The essays should reflect personal experiences, insights, and research related to the chosen topic.</li>
        </ul>
        <br>
        <h2 style="font-size: 40px;" class="ebooks2">ESSAY TOPICS</h2>
        <ul style="color: azure; " class="points">
          <P class="h1-content">Participants are free to choose from a selection of thought-provoking essay topics that revolve around the theme of the "Power of Words." These topics might include, but are not limited to:</P>
          <li>The role of storytelling in shaping cultural narratives.</li>
          <li>The impact of social media and online communication on public discourse.</li>
          <li>The historical significance of influential speeches.</li>
          <li>The influence of literature on personal growth and societal change.</li>
          <li>The power of words in advocating for social justice and human rights.</li>
          <li>The role of language in preserving and promoting cultural heritage.</li>
        </ul>
        <br>
        <h2 class="ebooks2">HOW TO ENTER</h2>
        <ul style="color: azure;" class="points">
          <li>To submit your <strong>ESSAY</strong>, enter submit button and follow the submission guidelines. Please include your contact information and a brief bio with your entry.</li>
        </ul>
        <br>
        <h2 style="font-size: 40px;" class="ebooks2">COMPETITION GUIDELINESS</h2>
        <ul style="color: azure; " class="points">
          <li>Essays must be original, unpublished works.</li>
          <li>Word count: 1,000-1,500 words.</li>
          <li>Submissions should be in English.</li>
          <li>Proper citation and references must be provided if research is included.</li>
          <li>Entries will be judged on creativity, depth of insight, and the quality of writing.</li>
          <li>Participants may only submit one essay.</li>
        </ul>
        <br>
        <h2 class="ebooks2">OUR INVITATION</h2>
        <ul style="color: azure;" class="points">
          <li>We invite you to embark on a literary journey with us, to explore the incredible breadth and depth of the written word, and to share your perspectives, experiences, and insights with a global community. This competition is a celebration of the power of words—words that have the capacity to ignite dialogue, broaden horizons, and inspire change. It is an opportunity for both aspiring and seasoned writers to demonstrate the influence and impact of language.</li>
        </ul>    
        <br>
        <h2 class="ebooks2">PRIZES</h2>
        <p style="color: azure;" class="h1-content">Winners will be selected in both the Youth and Adult categories. Prizes may include cash awards, certificates of recognition, publication opportunities, and more. The winning essays will be featured on our website and in promotional materials.<BR> <strong>December 1st, 2023</strong>.</p>
        <br>
          <h2 class="ebooks2">CONCLUTION</h2>
        <ul style="color: azure;" class="points">
          <li>The Power of Words" Essay Competition offers a unique opportunity for individuals to explore and celebrate the profound impact of language. Through this competition, we aim to foster a community of writers who understand the transformative potential of their words and contribute to meaningful conversations in our society.

            Join us in celebrating the written word and its remarkable ability to shape our world. Your essay could be the catalyst for positive change!
            
            We hope this description helps you set up an engaging and inspiring essay competition.</li>
        </ul>
      <br>
      </div>
      <div class="containeer">
      <a href="timer.php" class="start-btn">START COMPETITION 👍</a>
      </div>


     

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>