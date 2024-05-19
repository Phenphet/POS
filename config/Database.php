<?php 
    class DB{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $dbname = 'dbpossystem';
        public $conn ;

        public function __construct()
        {
            try {
                $db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $db;
            } catch (\PDOException $e) {
                echo 'Connection failed :-> '. $e->getMessage();
                die();
            }
        }

        public function connectDB()
        {
            return $this->conn;
        }
    }