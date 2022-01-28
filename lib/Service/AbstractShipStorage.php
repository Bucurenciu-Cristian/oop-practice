<?php

abstract class AbstractShipStorage
{
    abstract public function fetchSingleShipData($id);

    abstract public function fetchAllShipsData();

}