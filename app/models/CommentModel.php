<?php

class CommentModel extends BaseActiveRecord
{
    public $Id;
    public $Date;
    public $Text;
    public $User_Id;
    public $Blog_Id;
    public $Fio;
    protected static $table = 'Comments';

    public function save()
    {
        $queryText = 'INSERT INTO Comments(Text, `Date`, User_Id, Blog_Id)' .
            'VALUES(:Text, NOW(), :User_Id, :Blog_Id)';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(':Text', $this->Text);
        $query->bindParam(':User_Id', $this->User_Id);
        $query->bindParam(':Blog_Id', $this->Blog_Id);
        $query->execute();
    }

    public static function getComments($blog_id) {
        $queryText = 'SELECT * FROM Comments WHERE Blog_Id = :Blog_Id ORDER BY `Date` DESC;';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Blog_Id", $blog_id);
        if(!$query->execute()) {
            return null;
        }
        $list = [];
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $class = new static();
            foreach($row as $key => $value) {
                $class->$key = $value;
            }
            $class->Fio = UserModel::getUserFio($class->User_Id);
            array_push($list, $class);
        }
        return $list;
    }
}