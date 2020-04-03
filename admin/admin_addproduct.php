<?php
require_once '../load.php';
confirm_logged_in();

$genre_table = 'tbl_genre';
$genres      = getAll($genre_table);

if (isset($_POST['submit'])) {
    $movie = array(
        'cover'   => $_FILES['cover'],
        'title'   => trim($_POST['title']),
        'year'    => trim($_POST['year']),
        'run'     => trim($_POST['run']),
        'story'   => trim($_POST['story']),
        'trailer' => trim($_POST['trailer']),
        'release' => trim($_POST['release']),
        'genre'   => trim($_POST['genList']),
    );

    $result  = addMovie($movie);
    $message = $result;
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
    <title>Add Movie</title>
</head>
    <body>
        <a href="index.php">HOME</a>
        <a href="admin_logout.php">LOGOUT</a>
        <h2>Add Movie</h2>

        <?php echo !empty($message) ? $message : ''; ?>
        <form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
            <label>Cover Image:</label>
            <input type="file" name="cover" value="">

            <label>Movie Title:</label>
            <input type="text" name="title" value="">

            <label>Movie Year:</label>
            <input type="text" name="year" value="">

            <label>Movie Runtime:</label>
            <input type="text" name="run" value="">

            <label>Movie Release:</label>
            <input type="text" name="release" value="">

            <label>Movie Trailer:</label>
            <input type="text" name="trailer" value="">

            <label>Movie Storyline:</label>
            <textarea name="story"></textarea>

            <label>Movie Genre:</label>
            <select name="genList">
                <option>Please select a movie genre..</option>
                <?php while ($row = $genres->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $row['genre_id'] ?>"><?php echo $row['genre_name']; ?></option>
                <?php endwhile;?>
            </select>
            
            <button type="submit" name="submit">Add Movie</button>
        </form>

    <?php include '../templates/footer.php'?>

    </body>
</html>