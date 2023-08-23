<?php
include "../../Autoloader/autoloader.php";
$documentController= new DocumentsController();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = file_get_contents("php://input");
    $data = json_decode($data,true);
    $condition = "";
    foreach($data as $key=>$value)
    {
        $condition .= "`".$key."`='".$value."' and ";
    }
    $condition = substr($condition,0,strlen($condition)-4);

    $selectResult = $documentController->selectWhere($condition);
    $result = [];
    while($row = $selectResult->fetch_assoc())
    {
        array_push($result,$row);
    }
    echo json_encode($result);
}
/*
data:
{
    "documentid": 2,
    "filePath": "images/", 
    "subjectid": 1
}
*/
?>