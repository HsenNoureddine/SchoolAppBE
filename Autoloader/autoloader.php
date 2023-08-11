<?php
spl_autoload_register("myAutoLoader");
function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $ext = ".php";

    if($className == "Connection")
    {
        $path = "./";
        if(strpos($url, 'Endpoints'))$path = '../';
        else if(strpos($url, 'Controllers'))$path = '../';
        $fullPath = $path  . $className . $ext;

        include_once $fullPath;
    }
    else
    {
        $path = "./Models/";
        $objPath = "./Classes/";
        if(strpos($url, 'Endpoints') || strpos($url, 'Controllers') )
        {
            $path = '../Models/';
            $objPath = "../Classes/";
        }
        $modelPath = $path . "Model" . $ext;
        include_once $modelPath;

        $fullPath = $path  . $className . $ext;
        $fullPathObj = $objPath  . $className . $ext;

        include_once $fullPath;
        include_once $fullPathObj;

    }
    
}
?>