<?php

abstract class Model extends Connection{


    protected $tableName;
    public function  __construct(){
        parent::__construct();
        $this->CON->query("USE `" . $this->DBNAME . "`;");
    }

    public function getColumnNames(){
        // return $this->CON->query("SELECT name FROM sys.columns WHERE object_id = OBJECT_ID('` .$this->tableName. `') ");
        $query = "SHOW COLUMNS FROM " . $this->tableName;
        $result = $this->CON->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo $row['Field'] . "<br>";
            }
        } else {
            echo "Query failed.";
        }
    }
    public function selectAll()
    {
        return $this->CON->query("SELECT * FROM `".$this->tableName."`");
    }
    
    public function selectWhere($condition)
    {
        if($condition == "")
            return $this->CON->query("SELECT * FROM `".$this->tableName."` WHERE ".$condition);
        else
            return $this->CON->query("SELECT * FROM `".$this->tableName."`");
    }
    
    public function selectAttributeWhere($attributes,$condition)
    {
        if($condition == "")
            return $this->CON->query("SELECT ".$attributes." FROM `".$this->tableName."` WHERE ".$condition);
        else
            return $this->CON->query("SELECT ".$attributes." FROM `".$this->tableName."`");
    }

    public function update($condition,$attributesAssoc)
    {
      
    }
    public function insert()
    {

    }
    public function delete($condition)
    {
        return $this->CON->query("DELETE FROM `" . $this->tableName . "` WHERE " . $condition);
    }
}

?>