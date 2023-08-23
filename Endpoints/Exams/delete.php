<?php
include "../../Autoloader/autoloader.php";
$examsController = new ExamsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $condition = "";
    foreach ($data as $key => $value) {
        $condition .= "`" . $key . "`='" . $value . "' and ";
    }
    $condition = substr($condition, 0, strlen($condition) - 4);
    $result = $examsController->delete($condition);
    if ($result) echo json_encode("delete succeeded " . $result);
    else echo json_encode("delete failed " . $result);
}
/*
data:
{
    "examid" : 1,
    "classid" : 1,
    "date": "2006-09-23", 
    "exam": "math exam ",
    "subjectid": 1
}
*/
