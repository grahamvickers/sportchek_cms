
<!-- edit product object with credentials from the db -->
<?php
class Product
{

    private $conn;

    // Note: update table names, column names in here
    public $product_table               = 'tbl_products';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProducts()
    {

        $query = 'SELECT * FROM tbl_products';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProductByID($id)
    {
        $query = 'SELECT * FROM tbl_products WHERE id = prod_id';
      

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
        
    }

}
