<?php
include "../Autoloader/autoloader.php";
$subjectsController = new SubjectsController();
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
    $result = $subjectsController->update($condition, $data["attributes"]);
    if ($result) echo json_encode("update succeeded " . $result);
    else echo json_encode("update failed " . $result);
}
/*
data:
{
    "condition":
    {
        "subjectid": "1", 
        "classid": "1",
        "name": "physics"
    },
    "attributes":
    {
        "subjectid": "1", 
        "classid": "1",
        "name": "geography"
    }

}
*/
