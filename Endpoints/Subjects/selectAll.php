<?php
include "../../Autoloader/autoloader.php";
$subjectsController = new SubjectsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $subjectsController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
