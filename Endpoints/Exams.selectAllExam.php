<?php
include "../Autoloader/autoloader.php";
$examsController = new ExamsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $examsController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
