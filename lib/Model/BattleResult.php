<?php
namespace Model;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use JetBrains\PhpStorm\Internal\TentativeType;

class BattleResult implements \ArrayAccess
{
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;

    public function __construct($usedJediPowers, AbstractShip $winningShip = null, AbstractShip $losingShip = null)
    {
        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
    }

    /**
     * @return boolean
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship|null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }


    /**
     * @return Ship|null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }

    public function offsetExists($offset)
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
}