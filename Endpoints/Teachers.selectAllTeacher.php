<?php
include "../Autoloader/autoloader.php";
$teachersController = new TeachersController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $teachersController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
