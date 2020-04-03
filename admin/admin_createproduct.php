<?php
    require_once '../load.php';
    confirm_logged_in();
    user_verification();

if(isset($_POST['submit'])){
    $prod_name = trim($_POST['name']);
    $prod_details = trim($_POST['details']);
    $prod_price = trim($_POST['price']);
    $prod_img = trim($_POST['cover']);
    $prod_sex = trim($_POST['sex']);
    $prod_cat = trim($_POST['cat']);
    $prod_rating = trim($_POST['rating']);

    if(empty($prod_name) || empty($prod_details) || empty($prod_img) || empty($prod_price) || empty($prod_sex) || empty($prod_cat) || empty($prod_rating)){
        $message = 'Please fill out the required fields';
    }else{
        $message = createProduct($id, $prod_name, $prod_details, $prod_img, $prod_sex, $prod_cat, $prod_rating, $prod_price);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Poppins&display=swap" rel="stylesheet">
    <title>Create Admin User</title>
</head>
<body>
<?php include '../templates/header_admin.php'?>

    <h2>Create a new product</h2>
    <!-- <h4>Don't worry about making a password, it will make one for you.</h4> -->

    <?php echo!empty($message)? $message: '';?>
    <div>
        <div>
            <form action="admin_createproduct.php" method="post">
                <input type="text" name="name" value="" placeholder="Product Name">

                <input type="text" name="details" value="" placeholder="Product Details">

                <input type="text" name="price" value="" placeholder="Product Price">

                <input type="file" name="cover" value="" placeholder="Product Image">

                <input type="text" name="sex" value="" placeholder="Product Sex">

                <input type="text" name="cat" value="" placeholder="Product Category">

                <input type="text" name="rating" value="" placeholder="Product Rating">

                <button name="submit">UPLOAD</button>
            </form>
        </div>
    </div>
    
    <?php include '../templates/footer_admin.php'?>
</body>
</html>