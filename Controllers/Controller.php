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
        return $this->model->insert($values);
    }
    public function update($condition,$attributesAssoc)
    {
        return $this->model->update($condition,$attributesAssoc);
    }
    public function delete($condition)
    {
        return $this->model->update($condition);
    }
    public function selectAll()
    {
        return $this->model->selectAll();
    }
    public function selectWhere($condition)
    {
        return $this->model->selectWhere($condition);
    }
    public function selectAttributeWhere($attributes,$condition)
    {
        return $this->model->selectAttributeWhere($attributes,$condition);
    }

}

?>