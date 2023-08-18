<?php
include "../Autoloader/autoloader.php";
$userController= new UsersController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $result = $userController->signIn($data);
    if(mysqli_num_rows($result) == 0)echo "sign in failed";
    else echo "sign in successful";
}
?>