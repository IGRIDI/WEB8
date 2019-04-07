<?php

class UserModel extends BaseActiveRecord
{
    public $Fio;
    public $Email;
    public $Role;
    public $Role_Id;
    public $Login;
    public $Password;
    protected static $table = 'Users';

    public function save()
    {
        $queryText = 'INSERT INTO Users (Fio, Email, Login, Password, Role_Id) VALUES (:Fio, :Email, :Login, :Password, :Role_Id);';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Fio", $this->Fio);
        $query->bindParam(":Email", $this->Email);
        $query->bindParam(":Login", $this->Login);
        $query->bindParam(":Password", $this->Password);
        $query->bindParam(":Role_Id", $this->Role_Id);
        $query->execute();
            echo "Пользователь добавлен!";
    }

    public static function getUser($login, $password)
    {
        $queryText = 'SELECT Users.Id ,Users.Fio, Users.Email, Roles.Role
                      FROM users
                      JOIN roles ON users.Role_Id = roles.Id
                      WHERE Users.Login LIKE :Login AND Users.Password LIKE :Password;';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Login", $login);
        $query->bindParam("Password", $password);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
            return null;
        }
        $user = new UserModel();
        $user->Id = (int)$row["Id"];
        $user->Fio = $row["Fio"];
        $user->Email = $row["Email"];
        $user->Role = $row["Role"];
        $user->Login = $login;
        $user->Password = $password;
        return $user;
    }

    public static function getUserFio($id) {
        $queryText = 'SELECT Fio FROM users WHERE Id = :Id;';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Id", $id);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["Fio"];
    }

    public static function getLogins()
    {
        $queryText = 'SELECT Login FROM users;';
        $query = Database::getInstance()->prepare($queryText);
        $query->execute();
        $logins = [];
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            array_push($logins, $row['Login']);
        }
        return $logins;
    }

    public static function loginNotExist($login)
    {
        $queryText = 'SELECT Login FROM users WHERE Login = :Login;';
        $query = Database::getInstance()->prepare($queryText);
        $query->bindParam(":Login", $login);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if(empty($row)) {
            return true;
        }
        return false;
    }

}