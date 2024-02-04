<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

$message = [];

if (isset($_POST['upload_pdf'])) {
    $pdf_name = mysqli_real_escape_string($conn, $_FILES['pdf_file']['name']);
    $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
    $pdf_folder = 'pdf_uploaded_files/' . $pdf_name;

    if (move_uploaded_file($pdf_tmp_name, $pdf_folder)) {
        // File uploaded successfully, you can save details to the database if needed.
        $message[] = 'PDF File Uploaded Successfully...!';
    } else {
        $message[] = 'PDF File Upload Failed...!';
    }
}

// Rest of your existing code for the admin panel.

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Panel | PDF Upload</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Admin CSS File Link -->
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<style media="screen">
    .div1{
        border: .5px solid white;
        width: 500px;
        margin-left: 370px;
        margin-top: 50px;
        background: linear-gradient(#000,#300043);
        color: #fff;
        border-radius: 20px;
        margin-bottom: 30px;
    }

    .pdf-form {
        margin-left: 150px;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .upload{
        font-size: 20px;
        font-weight: bold;
        text-align: center;
    }

    #pdf{
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
        cursor: pointer;
    }

    #upload{
      display: inline-block;
      margin-top: 1rem;
      padding:1rem 3rem;
      cursor: pointer;
      color:var(--white);
      font-size: 1.8rem;
      border-radius: .5rem;
      text-transform: capitalize;
      background: #3c0653;
      margin-left: 40px
    }

    #upload:hover{
   background-color: #8a0e00;
   color: white;
}
</style>
<body>
<?php include 'admin_header.php'; ?>

<div class="div1">
        <form action="admin_pdf_books.php" method="post" enctype="multipart/form-data" class="pdf-form">
        <label for="" class="upload">Upload PDF File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        <input id="upload" type="submit" name="submit" value="Upload PDF">
        
        <?php
        include 'config.php';

        if (isset($_POST['submit'])){
            $pdf=$_FILES['pdf']['name'];
            $pdf_type=$_FILES['pdf']['type'];
            $pdf_size=$_FILES['pdf']['size'];
            $pdf_tmp_loc=$_FILES['pdf']['tmp_name'];
            $pdf_store="pdf_uploaded_files/".$pdf;

            move_uploaded_file($pdf_tmp_loc,$pdf_store);

            $sql="INSERT INTO pdf_file(pdf_file) VALUES('$pdf')";
            $query=mysqli_query($conn,$sql);
            
        }
?>
        </form>
    </div>

<!-- Admin JS File Link -->
<script src="js/admin_script.js"></script>

</body>
</html>
