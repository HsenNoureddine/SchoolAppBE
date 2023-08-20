<?php
include "../Autoloader/autoloader.php";
$classesController = new ClassesController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $result = $classesController->insert($data);
    if ($result) echo json_encode("insert succeeded");
    else echo json_encode("insert failed");
}
/*
data:
{
    "name": "math", 
    "code": "123",
    "fee": 55
}
*/