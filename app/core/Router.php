<?php

class Router
{
    private static $controller = "Home";
    private static $method = "index";

    public static function execute($route)
    {
        if(!empty($route)) {
            $path = explode("/", strtolower($route));
            $len = count($path);
            if($len == 1) {
                self::$method = $path[0];
            } elseif($len > 1) {
                self::$controller = ucfirst($path[0]);
                self::$method = $path[1];
            }
        }

        try {
            $class = new ReflectionClass(self::$controller);
            $method = $class->getMethod(self::$method);
            if ($method->isStatic()) {
                $method->invoke(null);
            } else {
                $method->invoke($class->newInstance());
            }
        } catch (ReflectionException $exception) {
            include APP_PATH.'app/views/404.php';
            return;
        }
    }
}