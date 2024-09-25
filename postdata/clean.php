<?php
function clean_input($input) {
    $input = trim($input);
    $input = slipslashes($input);
    $input = htmlspecialchars($input);
}
?>