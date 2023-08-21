<?php
include "../Autoloader/autoloader.php";
$gradesController = new GradesController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $gradesController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
