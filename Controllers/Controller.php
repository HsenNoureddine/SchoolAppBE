<?php

abstract class Controller{
    protected $modelName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        include_once "../Models/".$modelName.".php";
    }

}

?>