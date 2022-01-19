<?php

class Container
{
    public $configuration;

    /**
     * @param array $configuration
     */
    public function __construct( array $configuration) { $this->configuration = $configuration; }

    /**
     * @return PDO
     */
    public function getPDO()
    {

        $config = array(
            'user' => 'thelia',
            'db' => 'mysql:host=localhost;dbname=oo_battle',
            'password' => 'thelia123'
        );
        $pdo = new PDO(
            $config['db'],
            $config['user'],
            $config['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}