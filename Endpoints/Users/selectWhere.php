<?php
include "../../Autoloader/autoloader.php";
$usersController = new UsersController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $condition = "";
    foreach ($data as $key => $value) {
        $condition .= "`" . $key . "`='" . $value . "' and ";
    }
    $condition = substr($condition, 0, strlen($condition) - 4);

    $selectResult = $usersController->selectWhere($condition);
    $result = [];
    while ($row = $selectResult->fetch_assoc()) {
        array_push($result, $row);
    }
    echo json_encode($result);
}

/*
data:
{
    "userid": 124,
    "fullname": "Fadel Bayloun",
    "email": "fadel.bayloun12@gmail.com",
    "password": 123,
    "usertype": 1,
}
*/
