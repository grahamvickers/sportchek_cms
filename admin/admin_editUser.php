<?php 
    require_once '../load.php';
    confirm_logged_in();


    $id = $_SESSION['user_id'];
    $user = getSingleUser($id);

    if(is_string($user)){
        $message = $user;
    }

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        $message = editUser($id, $fname, $username, $password, $email);
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
        <title>Edit User</title>
    </head>
    <body>
        <a href="index.php">HOME</a>
        <a href="admin_logout.php">LOGOUT</a>
        <h2>Edit User Information</h2>
        <?php echo !empty($message)? $message : '';?>
        <div>
            <div>
                <form action="admin_editUser.php" method="post">

                    <?php while($info=$user->fetch(PDO::FETCH_ASSOC)):?>

                    <input type="text" name="fname" value="<?php echo $info['user_fname'];?>" placeholder="Full Name">

                    <input type="text" name="username" value="<?php echo $info['user_name'];?>" placeholder="Username">
                    
                    <input type="text" name="password" value="<?php echo $info['user_pass'];?>" placeholder="Password">

                    <input type="text" name="email" value="<?php echo $info['user_email'];?>" placeholder="Email">
                    
                    <?php endwhile?>
                    <button type="submit" name="submit">SAVE CHANGES</button>

                </form>
            </div>
        </div>
        <?php include '../templates/footer.php'; ?>
    </body>
</html>