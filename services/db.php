<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'takson');
    if(!$connection) {
        die('Connection feild: ' . mysqli_error());
    }
?>