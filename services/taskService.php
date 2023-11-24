<?php 
    include "dbConnection.php";
    include "../helpers/redirectHelper.php";

    function getAll() {
        global $connection;
        $query = "SELECT * FROM `Tasks`";

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        }

        return $queryResult;
    }

    function getById($taskId) {
        global $connection;
        $query = "SELECT * FROM `Tasks` WHERE Id = '$taskId'";

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        }

        $task = mysqli_fetch_assoc($queryResult);

        return $task;
    }

    function add($name, $description, $priority, $author, $assigned) {
        global $connection;
       
        $query = "INSERT INTO `Tasks` (`Id`, `Name`, `Description`, `Priority`, `AuthorName`, `AssignedName`, `StartDate`, `EndDate`) VALUES (NULL, '$name', '$description', '$priority', '$author', '$assigned', NULL, NULL)"; 
 
        $queryResult = mysqli_query($connection, $query);
 
        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        } else {
            redirect('index.php');
        }
     }

    function delete($taskId) {
        global $connection;

        $query = "DELETE FROM Tasks WHERE `Tasks`.`Id` = '$taskId'";

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        } else {
            redirect('index.php');
        }
    }

    function update($taskId, $name, $description, $priority, $author, $assigned) {
        global $connection;

        $query = "UPDATE `Tasks` SET `Name` = '$name', `Description` = '$description', `Priority` = '$priority', `AuthorName` = '$author', `AssignedName` = '$assigned' WHERE `Tasks`.`Id` = '$taskId';"; 

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        } else {
            redirect('index.php');
        }
    }

    function start($taskId, $date) {
        global $connection;
        $query = "UPDATE `Tasks` SET `StartDate` = '$date' WHERE `Tasks`.`Id` = '$taskId';";

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        } else {
            redirect('index.php');
        }
    }

    function finish($taskId, $date) {
        global $connection;
        $query = "UPDATE `Tasks` SET `EndDate` = '$date' WHERE `Tasks`.`Id` = '$taskId';";

        $queryResult = mysqli_query($connection, $query);

        if(!$queryResult) {
            die('Query feild: ' . mysqli_error($connection));
        } else {
            redirect('index.php');
        }
    }
?>