<?php
include "../../Autoloader/autoloader.php";
$calendarController= new CalendarController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $calendarController->insert($data);
    if($result)echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid": 1,
    "date": "2006-09-23", 
    "event": "test calendar"
}
*/