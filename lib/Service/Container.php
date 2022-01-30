<?php
namespace Service;
use PDO;

class Container
{
    private $configuration;
    private $shipLoader;
    private $battleManager;
    private $shipStorage;


    /**
     * @param array $configuration
     */
    public function __construct(array $configuration) { $this->configuration = $configuration; }

    /**
     * @return PDO
     */
    private function getPDO()
    {

        $pdo = new PDO(
            $this->configuration['db'],
            $this->configuration['user'],
            $this->configuration['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if ($this->shipLoader === null)
        {
            $this->shipLoader = new ShipLoader($this->getShipStorage());
        }
        return $this->shipLoader;
    }

    /**
     * @return mixed
     */
    public function getBattleManager()
    {
        if ($this->battleManager === null)
        {
            $this->battleManager = new BattleManager();
        }
        return $this->battleManager;
    }
    public function getShipStorage(){
        if ($this->shipStorage === null)
        {
            $this->shipStorage = new PdoShipStorage($this->getPDO());
//            $this->shipStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
        }
        return $this->shipStorage;

    }
}