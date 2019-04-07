<?php

class BlogModel extends BaseActiveRecord
{
    public $Id;
    public $CurrentDate;
    public $Topic;
    public $PathToPhoto;
    public $Message;
    public $Author;
    public $Comments;
    protected static $table = 'Blogs';

    public function save()
    {
        if(!empty($this->Id)) {
            $queryText = 'UPDATE Blogs SET CurrentDate = :CurrentDate, PathToPhoto = :PathToPhoto, Message = :Message,' .
                'Author = :Author, Topic = :Topic WHERE Id = :Id';
        } else {
            $queryText = 'INSERT INTO Blogs(Topic, CurrentDate, PathToPhoto, Message, Author)' .
                'VALUES(:Topic, NOW(), :PathToPhoto, :Message, :Author)';
        }
        $query = Database::getInstance()->prepare($queryText);
        if(!empty($this->Id)) {
            $query->bindParam(':Id', $this->Id);
            $query->bindParam(':CurrentDate', $this->CurrentDate);
        }
        $query->bindParam(':Topic', $this->Topic);
        $query->bindParam(':PathToPhoto', $this->PathToPhoto);
        $query->bindParam(':Message', $this->Message);
        $query->bindParam(':Author', $this->Author);
        $query->execute();
    }

    public static function paginate($page, $count)
    {
        $offset = $page * $count;
        $queryText = "SELECT * FROM Blogs ORDER BY CurrentDate DESC LIMIT $offset, $count";
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
            $class->Comments = CommentModel::getComments($class->Id);
            array_push($list, $class);
        }
        return $list;
    }

    public static function getCount() {
        $queryText = "SELECT COUNT(*) as count FROM Blogs;";
        $query = Database::getInstance()->prepare($queryText);
        if(!$query->execute()) {
            return null;
        }
        return $query->fetch(PDO::FETCH_ASSOC)["count"];
    }
}