<?php 
    class ProductController{
        private $con;

        public function __construct($db)
        {
            $this->con = $db->connectDB();
        }

        public function getProduct(){
            $query = 'SELECT productID, productName, productPrice, img FROM tblproducts ORDER BY productID DESC';
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }
    }