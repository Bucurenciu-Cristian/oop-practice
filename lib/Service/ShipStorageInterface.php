<?php
namespace Service;

interface ShipStorageInterface
{
    /**
     * Returns the single ship array for this id (see fetchAllShipsData)
     *
     * @param integer $id
     * @return array
     */
    public function fetchSingleShipData($id);
    /**
     * Returns an array of ship arrays, each with the following keys:
     *  * id
     *  * name
     *  * weapon_power
     *  * strength
     *  * team
     * @return array
     */
    public function fetchAllShipsData();

}