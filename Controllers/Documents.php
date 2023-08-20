<?php

class DocumentsController extends Controller{
    public function __construct()
    {
        Parent::__construct("Documents");
    }

    public function insertDocument($values)
    {
        $fileName  =  $_FILES['sendimage']['name'];
        $tempPath  =  $_FILES['sendimage']['tmp_name'];
        $fileSize  =  $_FILES['sendimage']['size'];
                
        if(empty($fileName))
        {
            $errorMSG = json_encode(array("message" => "please select image", "status" => false));	
            echo $errorMSG;
        }
        else
        {
            $upload_path = '../Documents/'.$values["filePath"]; // set upload folder path 
            
            $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
                
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','txt','html','zip','pdf','rar'); 
                            
            // allow valid image file formats
            if(in_array($fileExt, $valid_extensions))
            {				
                //check file not exist our upload folder path
                if(!file_exists($upload_path . $fileName))mkdir($upload_path);
                // check file size '5MB'
                if($fileSize < 5000000){
                    move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
                }
                else{		
                    $errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
                    echo $errorMSG;
                }
            }
            else
            {		
                $errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
                echo $errorMSG;		
            }
        }
                
        // if no error caused, continue ....
        if(!isset($errorMSG))
        {
            $values["filePath"] = $upload_path . $fileName;
            $this->insert($values);
            echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
        }
    }
}

?>