<?php

abstract class Model extends Connection{

    private $tableName;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }
    public function selectAll()
    {
        $this->CON->query("Select * from ".$this->tableName);
    }
    
    public function selectWhere($condition)
    {
        if($condition == "")
            $this->CON->query("Select * from ".$this->tableName." where ".$condition);
        else
            $this->CON->query("Select * from ".$this->tableName);
    }
    
    public function selectAttributeWhere($attributes,$condition)
    {
        if($condition == "")
            $this->CON->query("Select ".$attributes." from ".$this->tableName." where ".$condition);
        else
            $this->CON->query("Select ".$attributes." from ".$this->tableName);
    }



    public function update()
    {

    }
    public function insert()
    {

    }
    public function delete()
    {

    }
}

?>