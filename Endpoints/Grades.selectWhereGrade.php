<?php
include "../Autoloader/autoloader.php";
$gradesController = new GradesController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $condition = "";
    foreach ($data as $key => $value) {
        $condition .= "`" . $key . "`='" . $value . "' and ";
    }
    $condition = substr($condition, 0, strlen($condition) - 4);

    $selectResult = $gradesController->selectWhere($condition);
    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}

/*
data:
{
    "classid": "1", 
    "userid": "124",
    "grade": 55,
    "subjectid": 1,                         
    "title": "english exam "
}
*/
