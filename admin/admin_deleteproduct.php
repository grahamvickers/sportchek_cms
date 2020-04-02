<?php 
    require_once '../load.php';
    confirm_logged_in();

    $users = getAllUsers();
    if(!$users){
        $message = 'Failed to get user list';
    }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $delete_result = deleteUser($user_id);

        if(!$delete_result){
            $message = 'Failed to delete user';
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
    <title>Delete Users</title>
</head>
<body>
    <a href="index.php">HOME</a>
    <a href="admin_logout.php">LOGOUT</a>

    <h2>Delete an unwanted users</h2>
    <h4>Fire an employee? get him outta here by clicking DELETE</h4>

    <?php echo !empty($message)? $message : '';?>
    <table>
        <thead>
            <tr>
                <th>USER ID</th>
                <th>USER NAME</th>
                <th>USER EMAIL</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($user = $users->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $user['user_id'];?></td>
                <td><?php echo $user['user_name'];?></td>
                <td><?php echo $user['user_email'];?></td>
                <td><a href="admin_deleteUsers.php?id=<?php echo $user['user_id'];?>">DELETE USER</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>

    <?php include '../templates/footer.php'?>
</body>
</html>