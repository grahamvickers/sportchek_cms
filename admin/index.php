<?php
    require_once '../load.php';
    confirm_logged_in();
    user_verification();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Poppins&display=swap" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>
        <script>
            var day = new Date();
            var hr = day.getHours();
                if (hr < 11) {
                document.write("Good morning  <?php echo $_SESSION['user_name'];?>, looks like you need a cup of coffee!");
                }
                if (hr >= 11) {
                document.write("Good afternoon  <?php echo $_SESSION['user_name'];?>, how was lunch?");
                }
                if (hr > 17) {
                document.write("Good evening  <?php echo $_SESSION['user_name'];?>, don't work too late now!");
                }
        </script>
    </h2>

    <div class="adminCon">
        <div class="optionCon">
            <img src="../images/user.svg" alt="Create user icon">
            <a href="admin_createproduct.php">Create Product Now</a>
        </div>

        <div class="optionCon">
            <img src="../images/edit.svg" alt="Edit content icon">
            <a href="admin_editproduct.php">Edit Products Now</a>
        </div>

        <div class="optionCon">
            <img src="../images/delete.svg" alt="Edit content icon">
            <a href="admin_deleteproducts.php">Remove Product Now</a>
        </div>

        <div class="optionCon">
            <img src="../images/movie.svg" alt="signout icon">
            <a href="admin_addproduct.php">SIGN OUT</a>
        </div>
    </div>
    <a href="admin_login.php">SIGN OUT</a>

    <?php include '../templates/footer.php'?>
</body>
</html>