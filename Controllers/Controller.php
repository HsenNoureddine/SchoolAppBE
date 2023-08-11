<?php

abstract class Controller{
    protected $modelName;
    protected $model;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        include_once "../Models/".$modelName.".php";
        $this->model = new $modelName();
    }

    public function insert($values)
    {
        $this->model->insert($values);
    }
    public function update($condition,$attributesAssoc)
    {
        $this->model->update($condition,$attributesAssoc);
    }
    public function delete($condition)
    {
        $this->model->update($condition);
    }
    public function selectAll()
    {
        $this->model->selectAll();
    }
    public function selectWhere($condition)
    {
        $this->model->selectWhere($condition);
    }
    public function selectAttributeWhere($attributes,$condition)
    {
        $this->model->selectAttributeWhere($attributes,$condition);
    }

}

?>