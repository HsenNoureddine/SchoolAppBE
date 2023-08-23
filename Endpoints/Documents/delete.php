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
    while($row = $selectResult->fetch_assoc())
    {
        unlink($row["filePath"]);
    }
    $result = $documentController->delete($condition);
    if($result)echo json_encode("delete succeeded ".$result);
    else echo json_encode("delete failed ".$result);
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