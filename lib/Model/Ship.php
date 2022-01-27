<?php

class Ship extends AbstractShip
{
    private $jediFactor = 0;
    private $underRepair;

    function __construct($name)
    {
        PARENT::__construct($name);
        // randomly put this ship under repair
        $this->underRepair = mt_rand(1, 100) < 30;
    }
    public function isFunctional()
    {
        return !$this->underRepair;
    }
    /**
     * @param int $jediFactor
     */
    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }
    /**
     * @return int
     */
    public function getJediFactor()
    {
        return $this->jediFactor;
    }
    public function getType()
    {
        return 'Empire';
    }
}