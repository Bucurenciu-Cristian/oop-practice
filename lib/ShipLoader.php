<?php

class ShipLoader
{
    public function getShips()
    {
        $ships = [];

        $shipsData = $this->queryForShips();;

        foreach ($shipsData as $shipData)
        {
            $ship = new Ship($shipData['name']);
            $ship->setWeaponPower($shipData['weapon_power']);
            $ship->setStrength($shipData['strength']);
            $ship->setJediFactor($shipData['jedi_factor']);

            $ships[] = $ship;

        }
        return $ships;
    }

    private function queryForShips()
    {
        $databaseName = "oo_battle";
        $databaseUser = "thelia";
        $databasePassword = 'thelia123';
        $pdo = new PDO('mysql:host=localhost;dbname=' . $databaseName, $databaseUser, $databasePassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare("SELECT * FROM ship");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}