<?php 
ini_set('display_errors', 1);
require_once 'config/database.php';
require_once 'admin/scripts/read.php';
require_once 'load.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tbl = 'tbl_products';
    $col = 'prod_id';
    $getProduct = getSingleProducts($tbl, $col, $id);
}

//var_dump($getMovies);exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/main.css">
    <title>SportChek CMS</title>
</head>
<body>
    <?php include 'templates/header.php';?>
    <div id="browse">
        <h2>Product Details</h2>
    </div>
    <div id="details">
        <?php if(!is_string($getProduct)):?>
            <?php while($row = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
                <div>
                    <img src="images/<?php echo $row['prod_img'];?>" alt="<?php echo $row['prod_name']?>">               
                </div>
                <div id="more">
                    <h3><?php echo $row['prod_name'];?></h3>
                    <h4>$<?php echo $row['prod_price'];?></h4>
                    <div>
                        <p> <?php echo $row['prod_details'];?></p>
                    </div>
                    <div id="addCart">
                        <a href="index.php">ADD TO CART</a>
                    </div>
                </div>
            <?php endwhile;?>
        <?php endif;?>
    </div>
    <a href="index.php">Continue Shopping</a>

    <?php include 'templates/footer.php'?>
</body>
</html>