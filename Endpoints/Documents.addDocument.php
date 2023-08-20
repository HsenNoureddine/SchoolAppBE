<?php
include "../Autoloader/autoloader.php";
$assignmentController= new DocumentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data["classid"] = $_POST["classid"];    
    $data["filePath"] = $_POST["filePath"];    
    $data["subjectid"] = $_POST["subjectid"];    
    $assignmentController->insertDocument($data);
}
/*
we will be sending the data in a form to enable sending a file
*/
?>

