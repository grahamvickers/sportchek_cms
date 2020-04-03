<?php
require_once 'load.php';

// add filter here
if(isset($_GET['filter'])){
    //filter
    $args = array(
        'tbl' =>'tbl_products',
        // 'tbl2' =>'tbl_genre',
        // 'tbl3'=>'tbl_mov_genre',
        // 'col'=>'movies_id',
        // 'col2'=>'genre_id',
        // 'col3'=>'genre_name',
        'filter'=>$_GET['filter']
    );
    $getProducts = getProductsByFilter($args);
 }else{
     $product_table = 'tbl_products';
     $getProduct = getAll($product_table);
 }

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
    <!-- edit php functions with right db credentials -->
    <?php include 'templates/header.php';?>

    <main>
        <!-- this is the search and filter area -->
        <div>
            <input type="text" placeholder="Search.." name="search" id="search">
            <div id="filters">
                <button class="filter"><a href="index.php?filter=men">MEN</a></button>
                <button class="filter"><a href="index.php?filter=women">WOMEN</a></button>
                <button class="filter"><a href="index.php?filter=kids">KIDS</a></button>
                <button class="filter"><a href="index.php?filter=shoes">SHOES</a></button>
                <button class="filter"><a href="index.php?filter=gear">GEAR</a></button>
                <button class="filter"><a href="index.php?filter=deals">DEALS</a></button>
            </div>

        <!-- this is to display all products -->
            <?php while($row = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
            <div class="product-item">
                <img src="images/<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_name'];?>" />
                <h2><?php echo $row['prod_name'];?></h2>
                <h4> Details: <?php echo $row['prod_details'];?></h4>
                <a href="details.php?id=<?php echo $row['prod_id'];?>">Read More...</a>
            </div>
            <?php endwhile;?>
        </div>

        <div id="browse">
            <h2>Browse the 2020 collection</h2>
        </div>

        <!-- sign up promo area -->
        <div id="promo">
            <h4>ENJOY A BONUS OFFER OF 10% OFF YOUR NEXT PURCHASE WHEN YOU JOIN OUR MAILING COMMUNITY</h4>
            <p>BE THE FIRST TO RECEIVE NEW RELEASES, EXCLUSIVE DEALS, PLUSE MORE.</p>
            <button id="join"><a href="#">JOIN NOW</a></button>
        </div>
    </main>

    <?php include 'templates/footer.php';?>
</body>
</html>