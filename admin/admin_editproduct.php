<?php 
    require_once '../load.php';
    confirm_logged_in();


    $id = $_SESSION['user_id'];
    // $user = getSingleUser($id);
    $product = getSingleProduct($id);

    if(is_string($product)){
        $message = $product;
    }

    if(isset($_POST['submit'])){
        $prod_name = trim($_POST['name']);
        $prod_details = trim($_POST['details']);
        $prod_price = trim($_POST['price']);
        $prod_img = trim($_POST['cover']);
        $prod_sex = trim($_POST['sex']);
        $prod_cat = trim($_POST['cat']);
        $prod_rating = trim($_POST['rating']);

        $message = editProduct($id, $prod_name, $prod_details, $prod_img, $prod_sex, $prod_cat, $prod_rating, $prod_price);
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
        <title>Edit Product</title>
    </head>
    <body>
    <?php include '../templates/header_admin.php'?>

        <h2>Edit Product Information</h2>
        <?php echo !empty($message)? $message : '';?>
        <div>
            <div>
                <form action="admin_editproduct.php" method="post">

                    <?php while($info=$product->fetch(PDO::FETCH_ASSOC)):?>

                    <input type="text" name="name" value="<?php echo $info['prod_name'];?>" placeholder="Product Name">

                    <input type="text" name="details" value="<?php echo $info['prod_details'];?>" placeholder="Product Details">
                    
                    <input type="text" name="price" value="<?php echo $info['prod_price'];?>" placeholder="Product Price">

                    <input type="file" name="cover" value="<?php echo $info['prod_img'];?>" placeholder="Product Image">

                    <input type="text" name="sex" value="<?php echo $info['prod_sex'];?>" placeholder="Product Sex">

                    <input type="text" name="cat" value="<?php echo $info['prod_cat'];?>" placeholder="Product Category">

                    <input type="text" name="rating" value="<?php echo $info['prod_rating'];?>" placeholder="Product Rating">
                    
                    <?php endwhile?>
                    <button type="submit" name="submit">SAVE</button>

                </form>
            </div>
        </div>
        <?php include '../templates/footer_admin.php'; ?>
    </body>
</html>