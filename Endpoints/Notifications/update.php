<?php
include "../../Autoloader/autoloader.php";
$notificationController= new NotificationsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $condition = "";
    foreach($data["condition"] as $key=>$value)
    {
        if(strpos($key,"id"))
        {
            $condition .= "`".$key."`=".$value." and ";
        }
        else
        {
            $condition .= "`".$key."`='".$value."' and ";
        }
    }
    $condition = substr($condition,0,strlen($condition)-4);
    $result = $notificationController->update($condition,$data["attributes"]);
    if($result)echo json_encode("update succeeded ".$result);
    else echo json_encode("update failed ".$result);
}
/*
data:
{    
    "condition":
    {
    "classid": 1,
    "dateTime": "2006-09-23 11:50:23", 
    "event": "test assignment"
    },
    "attributes":
    {
    "classid": 1,
    "dateTime": "2006-09-23 11:50:23", 
    "event": "test event"
    }
}
*/
?>