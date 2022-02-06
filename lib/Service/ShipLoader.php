<?php
namespace Service;
use Model\RebelShip;
use Model\Ship;
use Model\ShipCollection;

class ShipLoader
{
    private $shipStorage;


    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return ShipCollection
     * @throws Exception
     */
    public function getShips()
    {
        $ships = [];

        try
        {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e)
        {
            trigger_error('Database Exception! '.$e->getMessage());
            // if all else fails, just return an empty array
            $shipsData = [];
        }

        foreach ($shipsData as $shipData)
        {

            $ships[] = $this->createShipFromData($shipData);

        }
        return new ShipCollection($ships);

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