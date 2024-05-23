<?php 
    class ProductController{
        private $con;

        public function __construct($db)
        {
            $this->con = $db->connectDB();
        }

        public function getProduct(){
            $query = 'SELECT 
                        productID, 
                        productName, 
                        productPrice, 
                        img 
                    FROM 
                        tblproducts 
                    ORDER BY 
                        productID DESC';

            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getProductOne($id){
            try {
                $query = 'SELECT 
                       tblproducts.productID AS productID, 
                        tblproducts.productName AS productName, 
                        tblproducts.productCategoryID AS CategoryID,
                        tblcategorie.categoryName AS categoryName, 
                        tblproducts.productPrice AS productPrice, 
                        tblproducts.productStock AS productStock, 
                        tblproducts.img AS img
                    FROM 
                        tblproducts
                    INNER JOIN 
                        tblcategorie 
                    ON 
                        tblcategorie.categoryID = tblproducts.productCategoryID
                    WHERE 
                        md5(productID)=:idproduct';

                $stmt = $this->con->prepare($query);
                $stmt->bindParam(':idproduct', $id);
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                return $result;
            } catch (\PDOException $e) {
                echo 'error -> '.$e->getMessage();
            }
        }

        public function tableProduct(){
            $query = "SELECT 
                        tblproducts.productID, 
                        tblproducts.productName, 
                        tblproducts.productPrice, 
                        tblproducts.img, 
                        tblcategorie.categoryName, 
                        tblproducts.created_at, 
                        tblproducts.updated_at 
                    FROM 
                        tblproducts
                    INNER JOIN 
                        tblcategorie 
                    ON 
                        tblcategorie.categoryID = tblproducts.productCategoryID 
                    ORDER BY 
                        tblproducts.productID ASC";
                        
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }

        public function addProduct($productName, $productCategory, $productStock, $productPrice, $productImage){
            try {
                $query = "INSERT INTO 
                            tblproducts (
                                productName, 
                                productCategoryID, 
                                productStock,
                                productPrice, 
                                deleted, 
                                img
                            ) 
                        VALUES(
                                :productName, 
                                :productCategoryID, 
                                :productStock, 
                                :productPrice, 
                                0, 
                                :img
                            )";
                $stmt = $this->con->prepare($query);
                $stmt->bindParam(':productName', $productName);
                $stmt->bindParam(':productCategoryID', $productCategory);
                $stmt->bindParam(':productStock', $productStock);
                $stmt->bindParam(':productPrice', $productPrice);
                $stmt->bindParam(':img', $productImage);
                $stmt->execute();
                return true;
            } catch (\PDOException $e) {
                echo 'error -> '.$e->getMessage();
                return false;
            }
        }
    }