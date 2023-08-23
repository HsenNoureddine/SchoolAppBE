<?php
include "../../Autoloader/autoloader.php";
$usersController = new UsersController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $usersController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
