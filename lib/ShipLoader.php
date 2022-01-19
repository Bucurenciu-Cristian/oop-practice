<?php

class ShipLoader
{
    private $pdo;
    private $user_db;
    private $user_pass;
    private $user_conn;

    /**
     * @param $user_db
     * @param $user_pass
     * @param $user_conn
     */
    public function __construct($user_db, $user_conn,$user_pass)
    {
        $this->user_db = $user_db;
        $this->user_conn = $user_conn;
        $this->user_pass = $user_pass;
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
        if ($this->pdo === null)
        {
            $this->pdo = new PDO($this->user_db, $this->user_conn, $this->user_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
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