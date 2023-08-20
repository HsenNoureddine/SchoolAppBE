<?php
include "../Autoloader/autoloader.php";
$assignmentController= new AssignmentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $condition = "";
    foreach($data as $key=>$value)
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
    $result = $assignmentController->delete($condition);
    if($result)echo json_encode("delete succeeded");
    else echo json_encode("delete failed");
}
/*
data:
{
    "classid": 1,
    "assignmentid": 1,
    "date": "2006-09-23", 
    "assignment": "test assignment"
}
*/
?>