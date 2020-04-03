<?php
require_once 'load.php';

// add filter here

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