<?php
include "../Autoloader/autoloader.php";
$newsController = new NewsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $condition = "";
    foreach ($data as $key => $value) {
        $condition .= "`" . $key . "`='" . $value . "' and ";
    }
    $condition = substr($condition, 0, strlen($condition) - 4);
    $result = $newsController->delete($condition);
    if ($result) echo json_encode("delete succeeded " . $result);
    else echo json_encode("delete failed " . $result);
}
/*
data:
{
    "newsid" : 1,
    "classid" : 1,
    "date": "2006-09-23", 
    "news": "monday is a holiday ",
    "subjectid": 1
}
*/
