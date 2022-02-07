<?php
namespace Model;
class Ship extends AbstractShip
{
    private $underRepair;
    use SettableJediFactorTrait;

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
    public function getType()
    {
        return 'Empire';
    }
}