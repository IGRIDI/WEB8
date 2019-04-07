<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("APP_PATH", __DIR__ . "/../");

require APP_PATH . 'app/core/load.php';

session_start();


Router::execute(empty($_GET["route"]) ? "" : $_GET["route"]);
