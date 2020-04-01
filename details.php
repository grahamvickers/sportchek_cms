<?php 
ini_set('display_errors', 1);
require_once 'config/database.php';
require_once 'admin/scripts/read.php';
require_once 'load.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tbl = 'tbl_movies';
    $col = 'movies_id';
    $getMovie = getSingleMovie($tbl, $col, $id);
}

//var_dump($getMovies);exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>
<body>
    <?php include 'templates/header.php'?>
    <?php if(!is_string($getMovie)):?>
        <?php while($row = $getMovie->fetch(PDO::FETCH_ASSOC)):?>
            <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title']?>">

            <h2>Name: <?php echo $row['movies_title'];?></h2>
            <h4>Year: <?php echo $row['movies_year'];?></h4>
            <p>Story: <br> <?php echo $row['movies_storyline'];?></p>
            <a href="index.php">BACK HOME</a>
        <?php endwhile;?>
    <?php endif;?>

    <?php include 'templates/footer.php'?>
</body>
</html>