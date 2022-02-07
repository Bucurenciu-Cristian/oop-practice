<?php

namespace Service;

class LoggableShipStorage implements ShipStorageInterface
{

    private $shipStorage;

    /**
     * @param ShipStorageInterface $shipStorage
     */
    public function __construct(ShipStorageInterface $shipStorage) { $this->shipStorage = $shipStorage; }


    public function fetchSingleShipData($id)
    {
        return $this->shipStorage->fetchSingleShipData($id);
    }


    public function fetchAllShipsData()
    {
        $ships =  $this->shipStorage->fetchAllShipsData();
        echo "Ba esti prost";
        $this->log(sprintf('Just fetched %s ships', count($ships)));
        return $ships;
    }

    private function log($message)
    {
        // todo - actually log this somewhere, instead of printing!
        echo "<p>".$message."</p>";
    }
}