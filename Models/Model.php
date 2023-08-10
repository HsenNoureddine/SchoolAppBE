<?php

abstract class Model extends Connection{

    protected $tableName;
    public function selectAll()
    {
        return $this->CON->query("Select * from `".$this->tableName."`");
    }
    
    public function selectWhere($condition)
    {
        if($condition == "")
            return $this->CON->query("Select * from `".$this->tableName."` where ".$condition);
        else
            return $this->CON->query("Select * from `".$this->tableName."`");
    }
    
    public function selectAttributeWhere($attributes,$condition)
    {
        if($condition == "")
            return $this->CON->query("Select ".$attributes." from `".$this->tableName."` where ".$condition);
        else
            return $this->CON->query("Select ".$attributes." from `".$this->tableName."`");
    }

    public function update($condition,$attributesAssoc)
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