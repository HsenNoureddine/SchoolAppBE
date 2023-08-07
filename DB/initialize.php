<?php
require("../env.php");

$DBsql = "CREATE DATABASE IF NOT EXISTS ".$DBNAME;

if ((mysqli_query($mysql, $DBsql))) {
    if (mysqli_warning_count($mysql) == 0) { 
         echo "Database created successfully";
    }
} else {
    echo "Error creating database: " . mysqli_error($mysql);
}
?>