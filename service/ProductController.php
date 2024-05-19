<?php 
    class ProductController{
        private $con;

        public function __construct($db)
        {
            $this->con = $db->connectDB();
        }

        public function getProduct(){
            $query = 'SELECT productID, productName, productPrice, img FROM tblproducts';
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }

        // public function getProductAndCategoryOne($keywords){
        //     $query = 'SELECT productID, productName, productPrice, img FROM tblproducts WHERE productName LIKE :keywords';
        //     $stmt = $this->con->prepare($query);
        //     $stmt->execute([':keywords' => $keywords]);
        //     $result = $stmt->fetchAll();
        //     return $result;
        // }

        // public function productAdd($productName, $productCategory, $productStock, $productPrice){
              
        // }
    }