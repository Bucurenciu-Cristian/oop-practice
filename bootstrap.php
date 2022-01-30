<?php

require_once __DIR__ . '/lib/Model/AbstractShip.php';
require_once __DIR__ . '/lib/Model/Ship.php';
require_once __DIR__ . '/lib/Model/RebelShip.php';
require_once __DIR__ . '/lib/Model/BrokenShip.php';
//require_once __DIR__ . '/lib/Service/BattleManager.php';
require_once __DIR__ . '/lib/Service/ShipStorageInterface.php';
require_once __DIR__ . '/lib/Service/PdoShipStorage.php';
require_once __DIR__ . '/lib/Service/JsonFileShipStorage.php';
require_once __DIR__ . '/lib/Service/ShipLoader.php';
require_once __DIR__ . '/lib/Model/BattleResult.php';
require_once __DIR__ . '/lib/Service/Container.php';


spl_autoload_register(function ($className)
{
    $path = __DIR__ . '/lib/' . str_replace('\\','/', $className).'.php';
    if (file_exists($path))
    {
        require $path;
    }

});
$config = array(
    'user' => 'thelia',
    'db' => 'mysql:host=localhost;dbname=oo_battle',
    'password' => 'thelia123'
);