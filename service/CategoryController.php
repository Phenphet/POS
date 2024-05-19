<?php 
    class ProductController{
        private $con;

        public function __construct($db)
        {
            $this->con = $db->connectDB();
        }

       
    }