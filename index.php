<?php 

require_once './lib/Dispatcher.php';
define('ROOT',dirname(__FILE__));

$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot(ROOT);
$dispatcher->dispatch();