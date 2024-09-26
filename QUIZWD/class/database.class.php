<?php 
    class Database{
        private $host = 'localhost';
        private $database = 'university';
        private $username = 'root';
        private $password = '';

        protected $connection;

        function connect(){
            try{
                $this->connection = new PDO(
                    "mysql:host=$this->host;dbname=$this->database",
                    $this->username,
                    $this->password
                );
            }catch(PDOException $e)
            {
                echo "Connection Success!";
            }
            return $this->connection;
        }
    }
?>