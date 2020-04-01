<?php 

require_once '../load.php';
confirm_logged_in();

// handle form submission
if (isset($_POST['submit'])) {
    $product = array(
        'img'   => $_FILES['image'],
        'details'   => trim($_POST['details']),
        'price'    => trim($_POST['price']),
        'rating'     => trim($_POST['rating']),
        'cat'   => trim($_POST['cat']),
        'name' => trim($_POST['name']),
        'sex' => trim($_POST['sex']),
    );

    $result = addProduct($product);
    $message = $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_addproduct.php" method="post">
        <label>Product Name</label><br>
        <input type="text" name="name" value=""><br><br>

        <label>Product Details</label><br>
        <textarea name="details"></textarea><br><br>

        <label>Product Price</label><br>
        <input type="text" name="price" value=""><br><br>

        <label>Product Image</label><br>
        <input type="file" name="image" value=""><br><br>

        <label>Product Sex</label><br>
        <input type="text" name="sex" value=""><br><br>

        <label>Product Category</label><br>
        <input type="text" name="cat" value=""><br><br>

        <label>Product Rating</label><br>
        <input type="text" name="rating" value=""><br><br>


        <button name="submit">Create Product</button>
    </form>
</body>
</html>