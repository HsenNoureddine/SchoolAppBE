<?php
include "../Autoloader/autoloader.php";
$classesController = new ClassesController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $classesController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
