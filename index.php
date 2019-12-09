<?php

define(ROOT, dirname(__FILE__));
require_once ROOT."/components/Router.php";
require_once ROOT."/models/Task.php";

session_start();

if(!isset($_SESSION['name'])) {
	$_SESSION['name'] = 'guest';
}

if(!isset($_SESSION['orderBy'])) {
	$_SESSION['orderBy'] = 'id';
}

$router = new Router();
$router->run();
