<?php 
    class CategoryController{
        private $con;

        public function __construct($db)
            {
                $this->con = $db->connectDB();
            }

        public function categoryAll(){
                $query = "SELECT categoryID, categoryName, created_at, updated_at FROM tblcategorie";
                $stmt = $this->con->prepare($query);
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                return $result;
        }

        public function categorySelectItem(){
            $query = "SELECT categoryID, categoryName FROM tblcategorie";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            return $result;
        }
    } 