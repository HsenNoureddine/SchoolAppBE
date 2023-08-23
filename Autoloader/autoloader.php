<?php
spl_autoload_register("myAutoLoader");
function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $ext = ".php";
    if(strpos($className, 'Controller'))
    {
        $className = substr($className, 0, strpos($className, "Controller"));
    }
    if($className == "Connection")
    {
        $path = "./";
        if(strpos($url, 'Endpoints'))$path = '../../';
        else if(strpos($url, 'Controllers'))$path = '../';

        $fullPath = $path  . $className . $ext;

        include_once $fullPath;
    }
    else
    {
        $pathModels = "./Models/";
        if(strpos($url, 'Controllers'))
        {
            $pathModels = '../Models/';
            $pathControllers = '../Controllers/';
        }
        else if(strpos($url, 'Endpoints'))
        {
            $pathModels = '../../Models/';
            $pathControllers = '../../Controllers/';
        }
        $modelPath = $pathModels . "Model" . $ext;
        $controllerPath = $pathControllers . "Controller" . $ext;

        if($className == "")return;

        include_once $modelPath;
        include_once $controllerPath;

        $fullPath = $pathModels  . $className . $ext;
        $fullPathController = $pathControllers  . $className . $ext;

        include_once $fullPath;
        include_once $fullPathController;

    }
    
}
?>