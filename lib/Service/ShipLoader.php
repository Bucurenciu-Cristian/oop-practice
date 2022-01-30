<?php
namespace Service;
use Model\RebelShip;
use Model\Ship;

class ShipLoader
{
    private $shipStorage;


    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return AbstractShip[]
     * @throws Exception
     */
    public function getShips()
    {
        $ships = [];

        $shipsData = $this->shipStorage->fetchAllShipsData();

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
        $shipData = $this->shipStorage->fetchSingleShipData($id);
        return $this->createShipFromData($shipData);
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