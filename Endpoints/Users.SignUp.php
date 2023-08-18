<?php
include "../Autoloader/autoloader.php";
$userController= new UsersController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $userController->insert($data);
    if($result)echo "sign Up succeeded";
    else echo "sign Up failed";
}
?>