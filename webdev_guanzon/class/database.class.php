<?php 
    class Database{
        protected $connection;

        function connect(){
            try{
                $this->connection = new PDO("mysql:host=localhost;dbname=addbooks", "root", "");
            }catch(PDOException $error){
                echo "Connection Error!" . $error->getMessage();
            }
            return $this->connection;
        }
    }
?>