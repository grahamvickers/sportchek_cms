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
    <link rel="stylesheet" href="css/main.css">
    <title>SportChek CMS</title>
</head>
<body>

    <?php include 'templates/header.php';?>
    <?php if(!is_string($getProduct)):?>
        <?php while($row = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
            <img src="images/<?php echo $row['prod_img'];?>" alt="<?php echo $row['prod_name']?>">

            <h2>Name: <?php echo $row['prod_name'];?></h2>
            <article class="test">Details: <br> <?php echo $row['prod_details'];?></article>
            <a href="index.php">BACK HOME</a>
        <?php endwhile;?>
    <?php endif;?>

    <?php include 'templates/footer.php'?>
</body>
</html>