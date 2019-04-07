<?php

class TestsModel extends BaseActiveRecord
{
    public $Id;
    public $Fio;
    public $Group;
    public $Answer1;
    public $Answer2;
    public $Answer3;
    public $IsAnswer1;
    public $IsAnswer2;
    public $IsAnswer3;
    public $DatePassage;
    protected static $table = 'Tests';

    public function save()
    {
        $queryText = 'INSERT INTO Tests(Fio, `Group`, Answer1, Answer2, Answer3, IsAnswer1, IsAnswer2, IsAnswer3, DatePassage)' .
            'VALUES(:Fio, :Grou, :Answer1, :Answer2, :Answer3, :IsAnswer1, :IsAnswer2, :IsAnswer3, CURDATE())';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(':Fio', $this->Fio);
        $query->bindParam(':Grou', $this->Group);
        $query->bindParam(':Answer1', $this->Answer1);
        $query->bindParam(':Answer2', $this->Answer2);
        $query->bindParam(':Answer3', $this->Answer3);
        $query->bindParam(':IsAnswer1', $this->IsAnswer1);
        $query->bindParam(':IsAnswer2', $this->IsAnswer2);
        $query->bindParam(':IsAnswer3', $this->IsAnswer3);
        $query->execute();
    }
}