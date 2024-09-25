<?php
        require_once "clean.php";

        $idErr = $nameErr = $typeErr = $availErr = $dateAddErr = $dateUpdErr = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        }
    ?>

        <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>

        <label for="type">Type</label>
        <input type="text" name="type" id="type"><br>

        <label for="availablity">Availability</label>
        <select name="availability" id="availability">
            <option value="" selected disabled>---</option>
            <option value="in-stock">In Stock</option>
            <option value="out-stock">Out of Stock</option>
        </select><br>

        <label for="date-added">Date Added</label>
        <input type="date" name="dateAdded" id="dateAdded"><br>

        <label for="date-updated">Date Updated</label>  
        <input type="date" name="dateUpdated" id="dateUpdated"><br>
        
        <button type="submit">
            <span>Submit</span>
        </button>
    </form>
8-9
