<?php 
    function addData ($name, $type, $price, $availability, $dateAdded, $dateUpdated) {
        $sql = "INSERT INTO Products(name, type, price, availability, dateAdded, dateUpdated) VALUES (:name, :type ,:price, :availability, :dateAdded, :dateUpdated";
        $query = $this->conn->prepare($sql);
        $query->bindParam(name, $name);
        $query->bindParam(type, $type);
        $query->bindParam(price, $price);
        $query->bindParam(availability, $availability);
        $query->bindParam(dateAdded, $dateAdded);
        $query->bindParam(dateUpdated, $dateUpdated);

        if($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
?>