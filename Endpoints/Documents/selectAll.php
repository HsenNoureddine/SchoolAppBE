<?php
include "../../Autoloader/autoloader.php";
$documentController= new DocumentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $selectResult = $documentController->selectAll();

    $result = [];
    while($row = $selectResult->fetch_assoc())
    {
        array_push($result,$row);
    }
    echo json_encode($result);
}
?>