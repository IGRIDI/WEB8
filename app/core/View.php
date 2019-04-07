<?php

class View
{
    public function generate($view, $args = [])
    {
        {
            extract($args);
            include APP_PATH . 'app/views/' . $view . '.php';
        }
    }
}