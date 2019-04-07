<?php

abstract class BaseActiveRecord
{
    public $Id;
    protected static $table;

    public function save()
    {
    }

    public function remove()
    {
        $queryText = 'DELETE FROM ' . static::$table . ' WHERE Id = :Id';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(':Id', $this->Id);
        $query->execute();
    }

    public static function get($id)
    {
        $queryText = "SELECT * FROM " . static::$table . " WHERE Id = :Id";
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Id", $id);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (is_null($row)) {
            return null;
        }
        $class = new static();
        foreach ($row as $key => $value) {
            $class->$key = $value;
        }
        return $class;
    }

    public static function getAll()
    {
        $queryText = "SELECT * FROM " . static::$table . ";";
        $query = Database::getInstance()->prepare($queryText);
        if(!$query->execute()) {
            return null;
        }
        $list = [];
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $class = new static();
            foreach($row as $key => $value) {
                $class->$key = $value;
            }
            array_push($list, $class);
        }
        return $list;
    }
}