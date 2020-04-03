<?php 
    require_once '../load.php';
    confirm_logged_in();

    $products = getAllProducts();
    // $users = getAllUsers();
    if(!$products){
        $message = 'Failed to get product list';
    }

    if(isset($_GET['id'])){
        $prod_id = $_GET['id'];
        $delete_result = deleteProduct($prod_id);

        if(!$delete_result){
            $message = 'Failed to delete product';
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
    <title>Delete Products</title>
</head>
<body>
<?php include '../templates/header_admin.php'?>


    <h2>Remove product from database</h2>
    <h5>Get Rid of a product? get it outta here by clicking DELETE</h5>

    <?php echo !empty($message)? $message : '';?>
    <table>
        <thead>
            <tr>
                <th>PRODUCT ID</th>
                <th>PRODUCT NAME</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($product = $products->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $product['prod_id'];?></td>
                <td><?php echo $product['prod_name'];?></td>
                <td><a id="delete" href="admin_deleteproduct.php?id=<?php echo $product['prod_id'];?>">DELETE</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>

    <?php include '../templates/footer_admin.php'?>
</body>
</html>