<?php
namespace Service;

use InvalidArgumentException;

class PdoShipStorage implements ShipStorageInterface
{
    private $pdo;

    /**
     * @param $pdo
     */
    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }


    public function fetchAllShipsData()
    {
        //        throw new InvalidArgumentException("Ba esti prost?");
        $pdo = $this->pdo;
        $statement = $pdo->prepare("SELECT * FROM ship");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchSingleShipData($id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipData = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$shipData)
        {
            return null;
        }
        return $shipData;
    }
}