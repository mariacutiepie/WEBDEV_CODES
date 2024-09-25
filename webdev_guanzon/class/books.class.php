<?php
    require_once "database.class.php";

    class Books{
        private $conn;

        function __construct()
        {
            $db = new Database;
            $this->conn = $db->connect();
        }
        function getData(){
            $sql = "SELECT * FROM books";
            $query = $this->conn->prepare($sql);
            if($query->execute()){
                $data = $query->fetchAll();
            }
            return $data;
        }

        function setData($bookTitle, $authorsName, $genre, $publisher, $pubdate, $edition, $copies, $format, $age,  $description){
            $sql = "INSERT INTO books(bookTitle, authorsName, genre, publisher, pubdate, edition, copies, format, age, description) VALUES (:bookTitle, :authorsName, :genre, :publisher, :pubdate, :edition, :copies, :format, :age, :description );";
            $query = $this->conn->prepare($sql);
            $query->bindParam(':bookTitle', $bookTitle);
            $query->bindParam(':authorsName', $authorsName);
            $query->bindParam(':genre', $genre);
            $query->bindParam(':publisher', $publisher);
            $query->bindParam(':pubdate', $pubdate);
            $query->bindParam(':edition', $edition);
            $query->bindParam(':copies', $copies);
            $query->bindParam(':format', $format);
            $query->bindParam(':age', $age);
            $query->bindParam(':description', $description);

            if($query->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>
