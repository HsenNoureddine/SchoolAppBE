<?php
include "../Autoloader/autoloader.php";
$teachersController = new TeachersController();
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
    $result = $teachersController->update($condition, $data["attributes"]);
    if ($result) echo json_encode("update succeeded " . $result);
    else echo json_encode("update failed " . $result);
}
/*
data:
{
    "condition":
    {
        "classid": 1,
        "userid": 124,
        "subjectid": 1
    },
    "attributes":
    {
        "classid": 1,
        "userid": 124,
        "subjectid": 4
    }

}
*/
