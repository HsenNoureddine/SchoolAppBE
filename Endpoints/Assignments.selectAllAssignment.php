<?php
include "../Autoloader/autoloader.php";
$assignmentsController= new AssignmentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $selectResult = $assignmentsController->selectAll();

    $result = [];
    while($row = $selectResult->fetch_assoc())
    {
        array_push($result,$row);
    }
    echo json_encode($result);
}


?>