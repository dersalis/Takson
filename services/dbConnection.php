<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'takson');
    if(!$connection) {
        die('DB connection feild.');
    }
?>