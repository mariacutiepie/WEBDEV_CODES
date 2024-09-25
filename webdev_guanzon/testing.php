<form action="" method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id">
    <input type="submit" value="delete" id="delete" name="delete">
</form>

<?php
if (!empty($_POST["delete"] && $_SERVER["REQUEST_METHOD"] == 'POST')){
    $id = $_POST["id"];
    if ()
}