<?php
include "../../Autoloader/autoloader.php";
$userClasses= new UserClasses();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $userClasses->insert($data);
    if($result)echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid": 1,
    "userid": 1
}
*/
?>
