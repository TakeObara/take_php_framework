<?php 
define('ROOT', dirname(__FILE__));
require_once ROOT.'/app/config/config.php';
require_once ROOT.'/lib/Dispatcher.php';
require_once ROOT.'/lib/ModelBase.php';
ModelBase::setConnectInfo($connectInfo);
$dispatcher = new Dispatcher();
$dispatcher->setSystemRoot(ROOT);
$dispatcher->dispatch();