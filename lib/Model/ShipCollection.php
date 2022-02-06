<?php

namespace Model;

use Traversable;

class ShipCollection implements \ArrayAccess, \IteratorAggregate
{

    /**
     * @var AbstractShip[]
     */
    private $ships;

    /**
     * @param $ships
     */
    public function __construct(array $ships) { $this->ships = $ships; }


    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->ships);
    }

    public function offsetGet($offset)
    {
        return $this->ships[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->ships[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->ships[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->ships);
    }

    public function removeAllBrokenShips()
    {
        foreach ($this->ships as $key => $ship)
        {
            if (!$ship->isFunctional())
            {
                unset($this->ships[$key]);
            }
        }
    }
}