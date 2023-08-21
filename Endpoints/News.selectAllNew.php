<?php
include "../Autoloader/autoloader.php";
$newsController = new NewsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $newsController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
