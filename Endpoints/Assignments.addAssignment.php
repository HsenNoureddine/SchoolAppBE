<?php
include "../Autoloader/autoloader.php";
$assignmentController= new AssignmentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $assignmentController->insert($data);
    if($result)echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid": 1,
    "date": "2006-09-23", 
    "assignment": "test assignment"
}
*/
?>
