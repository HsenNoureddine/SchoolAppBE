<?php
include "../Autoloader/autoloader.php";
$newsController = new NewsController();
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
    $result = $newsController->update($condition, $data["attributes"]);
    if ($result) echo json_encode("update succeeded " . $result);
    else echo json_encode("update failed " . $result);
}
/*
data:
{
    "condition":
    {
        "newsid" : 1,
        "classid" : 1,
        "date": "2006-09-23", 
        "news": "tuesday is a holiday ",
        "subjectid": 1
    },
    "attributes":
    {
        "newsid" : 1,
        "classid" : 1,
        "date": "2006-09-23", 
        "news": "monday is a holiday",
        "subjectid": 1
    }

}
*/
