<?php
include "../Autoloader/autoloader.php";
$calendarController= new CalendarController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $selectResult = $calendarController->selectAll();

    $result = [];
    while($row = $selectResult->fetch_assoc())
    {
        array_push($result,$row);
    }
    echo json_encode($result);
}
