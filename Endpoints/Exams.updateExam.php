<?php
include "../Autoloader/autoloader.php";
$examsController = new ExamsController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $condition = "";
    foreach ($data["condition"] as $key => $value) {
        if (strpos($key, "id")) {
            $condition .= "`" . $key . "`=" . $value . " and ";
        } else {
            $condition .= "`" . $key . "`='" . $value . "' and ";
        }
    }
    $condition = substr($condition, 0, strlen($condition) - 4);
    $result = $examsController->update($condition, $data["attributes"]);
    if ($result) echo json_encode("update succeeded " . $result);
    else echo json_encode("update failed " . $result);
}
/*
data:
{
    "condition":
    {
        "examid" : 1,
        "classid" : 1,
        "date": "2006-09-23", 
        "exam": "math exam ",
        "subjectid": 1
    },
    "attributes":
    {
        "examid" : 1,
        "classid" : 1,
        "date": "2006-09-25", 
        "exam": "math exam updated",
        "subjectid": 1
    }

}
*/
