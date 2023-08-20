<?php
include "../Autoloader/autoloader.php";
$gradesController = new GradesController();
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
    $result = $gradesController->update($condition, $data["attributes"]);
    if ($result) echo json_encode("update succeeded " . $result);
    else echo json_encode("update failed " . $result);
}
/*
data:
{
    "condition":
    {
        "classid": "1", 
        "userid": "124",
        "grade": 55,
        "subjectid": 1,                         
        "title": "english exam "
    },
    "attributes":
    {
        "classid": "1", 
        "userid": "124",
        "grade": 59,
        "subjectid": 1,                         
        "title": "english exam "
    }

}
*/
