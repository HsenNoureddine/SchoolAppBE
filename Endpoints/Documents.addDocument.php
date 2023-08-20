<?php
include "../Autoloader/autoloader.php";
$documentController= new DocumentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data["classid"] = $_POST["classid"];    
    $data["filePath"] = $_POST["filePath"];    
    $data["subjectid"] = $_POST["subjectid"];    
    $documentController->insertDocument($data);
}
/*
we will be sending the data in a form to enable sending a file
*/
?>

