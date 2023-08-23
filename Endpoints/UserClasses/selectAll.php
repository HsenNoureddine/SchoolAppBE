<?php
include "../../Autoloader/autoloader.php";
$userClassesController = new UserClassesController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $userClassesController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
