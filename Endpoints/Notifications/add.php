<?php
include "../../Autoloader/autoloader.php";
$notifiactionController= new NotificationsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $notifiactionController->insert($data);
    if($result)echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid": 1,
    "dateTime": "2006-09-23 11:50:23", 
    "event": "test assignment"
}
*/
?>
