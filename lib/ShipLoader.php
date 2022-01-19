<?php

class ShipLoader
{
    /**
     * @return Ship[]
     * @throws Exception
     */
    public function getShips()
    {
        $ships = [];

        $shipsData = $this->queryForShips();;

        foreach ($shipsData as $shipData)
        {

            $ships[] = $this->createShipFromData($shipData);

        }
        return $ships;
    }

    /**
     * @param $id
     * @return Ship|null
     */
    public function findOneById($id)
    {
        $databaseName = "oo_battle";
        $databaseUser = "thelia";
        $databasePassword = 'thelia123';
        $pdo = new PDO('mysql:host=localhost;dbname=' . $databaseName, $databaseUser, $databasePassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipData = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipData)
        {
            return null;
        }
        return $this->createShipFromData($shipData);
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

    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);
        $ship->setJediFactor($shipData['jedi_factor']);
        return $ship;
    }
}