<?php
class Product
{
    private $conn;

    // update table names, column names in here
    public $product_table            = 'tbl_product';
    public $category_table           = 'tbl_category';
    public $product_cat_linked_table = 'tbl_product_cat';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProducts()
    {
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->product_table . ' p';
        $query .= ' LEFT JOIN ' . $this->product_cat_linked_table . ' link ON link.product_id = p.product_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' GROUP BY p.product_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProductByCategory($category){
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->product_table . ' p';
        $query .= ' LEFT JOIN ' . $this->product_cat_linked_table . ' link ON link.product_id = p.product_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' GROUP BY p.product_id';
        $query .= ' HAVING category_name LIKE "%'.$category.'%"';

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProductByID($id)
    {
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->product_table . ' p';
        $query .= ' LEFT JOIN ' . $this->product_cat_linked_table . ' link ON link.product_id = p.product_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' WHERE p.product_id=' . $id;
        $query .= ' GROUP BY p.product_id';

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
