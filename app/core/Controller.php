<?php

class Controller
{
    public $view;
    protected $className;

    function __construct()
    {
        $this->view = new View();
    }

    public function index()
    {
    }

    public function getUserInfo()
    {
        if (!empty($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $role = $this->describeRole($user->Role);
            $result = "$role: $user->Fio <a href='/logout'>Выйти</a>";
        } else {
            $result = " <a href='/login'>Войти</a>";
        }
        return $result;
    }

    public function isInRole()
    {
        if (func_num_args() == 0) {
            return false;
        }
        if (!empty($_SESSION['user'])) {
            $args = func_get_args();
            for ($i = 0; $i < func_num_args(); $i++) {
                if (strcmp($_SESSION['user']->Role, $args[$i]) == 0) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }

    public function saveVisitInformation($viewName)
    {
        $model = new SiteVisitorModel();
        $model->VisitPage = $this->className . $viewName;
        $model->IpAddress = $_SERVER['REMOTE_ADDR'];
        $model->HostName = gethostbyaddr($model->IpAddress);
        $model->BrowserName = $_SERVER['HTTP_USER_AGENT'];
        $model->save();
    }

    private function describeRole($role)
    {
        switch ($role) {
            case 'Admin':
                return "Админ";
            case 'User':
                return "Пользователь";
            default:
                return "";
        }
    }

    public function isAuthorize() {
        return !empty($_SESSION['user']);
    }
}