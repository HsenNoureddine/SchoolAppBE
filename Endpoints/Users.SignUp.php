<?php
include "../Autoloader/autoloader.php";
$userController= new UsersController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $userController->insert($data);
    if($result)echo json_encode("sign Up succeeded");
    else echo json_encode("sign Up failed");
}
?>