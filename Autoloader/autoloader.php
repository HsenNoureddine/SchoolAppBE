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
    }
    else
    {
        $path = "./Models/";
        if(strpos($url, 'Endpoints'))$path = '../Models/';
        else if(strpos($url, 'Controllers'))$path = '../Models/';
        $modelPath = $path . "Model" . $ext;
        include_once $modelPath;
    }
    $fullPath = $path  . $className . $ext;
    include_once $fullPath;
}
?>