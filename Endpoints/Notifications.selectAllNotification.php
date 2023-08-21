<?php
include "../Autoloader/autoloader.php";
$notificationsController = new NotificationsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectResult = $notificationsController->selectAll();

    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}
