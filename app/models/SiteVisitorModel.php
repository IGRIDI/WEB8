<?php

class SiteVisitorModel extends BaseActiveRecord
{
    public $VisitingTime;
    public $VisitPage;
    public $IpAddress;
    public $HostName;
    public $BrowserName;
    protected static $table = 'SiteVisitors';

    public function save()
    {
        $queryText = 'INSERT INTO SiteVisitors(VisitingTime, VisitPage, IpAddress, HostName, BrowserName)
          VALUES (NOW(), :VisitPage, :IpAddress, :HostName, :BrowserName);';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(':VisitPage',$this->VisitPage);
        $query->bindParam(':IpAddress', $this->IpAddress);
        $query->bindParam(':HostName', $this->HostName);
        $query->bindParam(':BrowserName', $this->BrowserName);
        $query->execute();
    }

    public static function paginate($page, $count)
    {
        $offset = $page * $count;
        $queryText = "SELECT * FROM SiteVisitors ORDER BY VisitingTime DESC LIMIT $offset, $count";
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

    public static function getCount() {
        $queryText = "SELECT COUNT(*) as count FROM SiteVisitors;";
        $query = Database::getInstance()->prepare($queryText);
        if(!$query->execute()) {
            return null;
        }
        return $query->fetch(PDO::FETCH_ASSOC)["count"];
    }
}