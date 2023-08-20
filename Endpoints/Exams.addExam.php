<?php
include "../Autoloader/autoloader.php";
$examsController = new ExamsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $result = $examsController->insert($data);
    if ($result) echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "classid" : 1,
    "date": "2006-09-23", 
    "exam": "math exam ",
    "subjectid": 1
}
*/
