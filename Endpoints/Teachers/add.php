<?php
include "../../Autoloader/autoloader.php";
$teachersController = new TeachersController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $result = $teachersController->insert($data);
    if ($result) echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid": 1,
    "userid": 124,
    "subjectid": 1
}
*/
