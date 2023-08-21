<?php

abstract class Model extends Connection{

    
    protected $tableName;
    public function  __construct(){
        parent::__construct();
        $this->CON->query("USE `" . $this->DBNAME . "`;");
    }

    public function getColumnNames(){
        $query = "SHOW COLUMNS FROM " . $this->tableName;
        $result = $this->CON->query($query);

        $columnNames = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $columnNames[] = $row['Field'];
            }
        } else {
            echo "Query failed.";
        }
        foreach($columnNames as $col)
        {
            echo $col ." ";
        }
        echo "<br/>";
        return $columnNames;
    
    }
    public function selectAll()
    {
        return $this->CON->query("SELECT * FROM `".$this->tableName."`");
    }
    
    public function selectWhere($condition)
    {
        if($condition != "")
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
        $flag = 0;
        $query = "UPDATE `".$this->tableName."` SET ";
        foreach($attributesAssoc as $col => $value)
        {
            if($flag) 
                $query .= ",";
            $query .= "`".$col."`='".$value."'";
            $flag = 1;
        }
        $query .= " WHERE "."$condition";
        return $this->CON->query($query);
      
    }
    public function insert($values)
    {
        $flag = 0;
        $colNames = array_keys($values);
        $query = "INSERT INTO `".$this->tableName."`(";
        foreach($colNames as $col)
        {
            if($flag)
                $query .= ",";
            $query .= "`".$col."`";
            $flag = 1;

        }
        $flag = 0;
        $query .= ") VALUES (";
        foreach ($values as $val) {
            if ($flag)
                $query .= ",";
            $query .= "'" . $val . "'";
            $flag = 1;
        }
        $query .= ")";
        return $this->CON->query($query);
    }
    public function delete($condition)
    {
        return $this->CON->query("DELETE FROM `" . $this->tableName . "` WHERE " . $condition);
    }
}

?>