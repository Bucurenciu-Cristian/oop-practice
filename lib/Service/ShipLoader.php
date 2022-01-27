<?php

class ShipLoader
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

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
        $pdo = $this->getPDO();
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
        $pdo = $this->getPDO();
        $statement = $pdo->prepare("SELECT * FROM ship");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        return $this->pdo;
    }

    private function createShipFromData(array $shipData)
    {
        if ($shipData['team'] == "rebel")
        {
            $ship = new RebelShip($shipData['name']);
        }else{
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);

        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);
        return $ship;
    }

}