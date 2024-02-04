<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location: login.php');
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'Already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart` (user_id, name, image) VALUES ('$user_id', '$product_name', '$product_image')") or die('query failed');
        $message[] = 'Product added to cart!';
    }
}

// Fetch products from the database
$query = mysqli_query($conn, "SELECT * FROM products");
$products = [];

if ($query) {
    while ($row = mysqli_fetch_assoc($query)) {
        $products[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EBooks | Read PDF Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="read-pdf-heading">
        <h3>Read PDF Books</h3>
        <p><a href="home.php">Home</a> / Read PDF Books</p>
    </div>

    <section class="latest-products">
        <h1 class="main-title">Read PDF Books</h1>
        <div class="box-container">
            <?php
            // Loop through the products and display them
            foreach ($products as $product) {
                echo '<form action="" method="post" class="box">';
                echo '<img class="image" src="inventory_uploaded_img/' . $product['image'] . '" alt="">';
                echo '<div class="name">' . $product['name'] . '</div>';
                echo '<input type="hidden" name="product_name" value="' . $product['name'] . '">';
                echo '<input type="hidden" name="product_image" value="' . $product['image'] . '">';
                
                // Display the link to the associated PDF file for each product
                $pdfFileName = $product['pdf_file']; // Assuming you have a 'pdf_file' column in your 'products' table
                $pdfPath = 'pdf_uploaded_files/' . $pdfFileName;

                echo '<a href="' . $pdfPath . '" target="_blank" class="read">Read PDF</a><br>';
                echo '</form>';
            }
            ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- JS File Link -->
    <script src="js/script.js"></script>
</body>
</html>
