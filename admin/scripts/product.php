<?php

// get all products
function getAllProducts(){
    $pdo = Database::getInstance()->getConnection();

    $get_product_query = "SELECT * FROM tbl_products";
    $products = $pdo->query($get_product_query);

    if($products){
        return $products;
    }else{
        return false;
    }
}


// delete products
function deleteProduct($id){
    $pdo = Database::getInstance()->getConnection();

    $delete_product_query = "DELETE FROM tbl_products WHERE prod_id = :id";
    $delete_product_set = $pdo->prepare($delete_product_query);
    $delete_product_result = $delete_product_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($delete_product_result && $delete_product_set->rowCount() > 0){
        redirect_to('admin_deleteproduct.php');
    }else{
        // product does not exist
        return false;
    }
}

// get single products for editing
function getSingleProduct($id){
    $pdo = Database::getInstance()->getConnection();

    $get_product_query = 'SELECT * FROM tbl_products WHERE prod_id= :id';
    $get_product_set = $pdo->prepare($get_product_query);
    $get_product_result = $get_product_set->execute(
        array(
            ':id'=>$id
        )
    );

    if($get_product_result){
        return $get_product_set;
    }else{
        return 'product could not be updated';
    }
}


// edit products
function editProduct($id, $prod_name, $prod_details, $prod_img, $prod_sex, $prod_cat, $prod_rating, $prod_price){
    $pdo = Database::getInstance()->getConnection();

    $update_product_query = "UPDATE tbl_products SET prod_name = :prod_name, prod_details = :details, prod_img = :cover, prod_sex = :sex, prod_cat = :cat, prod_rating = :rating, prod_price = :price, WHERE prod_id= :id";
    $update_product_set = $pdo->prepare($update_product_query);
    $get_product_result = $update_product_set->execute(
        array(
            ':id'=>$id,
            ':prod_name'=>$prod_name,
            ':details'=>$prod_details,
            ':cover'=>$prod_img,
            ':sex'=>$prod_sex,
            ':cat'=>$prod_cat,
            ':price'=>$prod_price,
            ':rating'=>$prod_rating

        )
    );

    if($get_product_result){
        redirect_to('index.php');
    }else{
        // product does not exist
        return 'Product could not be updated, please try again';
    }
}


// create a new product
function createProduct($id, $prod_name, $prod_details, $prod_img, $prod_sex, $prod_cat, $prod_rating, $prod_price){
    $pdo = Database::getInstance()->getConnection();
    
    //TODO: finish the below so that it can run a SQL query
    // to create a new product with provided data
    $create_product_query = 'INSERT INTO tbl_products(prod_name, prod_details, prod_img, prod_sex, prod_cat, prod_rating, prod_price)';
    $create_product_query .= ' VALUES(:name, :details, :cover, :sex, :cat, :rating, :price )';

    $create_product_set = $pdo->prepare($create_product_query);
    $create_product_result = $create_product_set->execute(
        array(
            ':name'=>$prod_name,
            ':details'=>$prod_details,
            ':cover'=>$prod_img,
            ':sex'=>$prod_sex,
            ':cat'=>$prod_cat,
            ':rating'=>$prod_rating,
            ':price'=>$prod_price,
        )
    );
    //TODO: redirect to index.php if creat user successfully
    // otherwise, return a error message
    if($create_product_result){
        redirect_to('index.php');
    }else{
        return 'The product was not created';
    }
}