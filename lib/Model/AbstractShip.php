<?php
namespace Model;
use Exception;

abstract class AbstractShip
{
    private $id;

    private $name;

    private $weaponPower = 0;

    private $strength = 0;

    abstract public function getJediFactor();

    abstract public function getType();

    abstract public function isFunctional();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function sayHello()
    {
        echo 'Hello!';
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @return int
     * @throws Exception
     */
    public function setStrength($number)
    {
        if (!is_numeric($number))
        {
            throw new Exception('Invalid strength passed ' . $number);
        }

        $this->strength = $number;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat)
        {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );
        } else
        {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }

    /**
     * @return int
     */
    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->getName();
    }

//    public function __get($name)
//    {
//        return $this->$name;
//    }


}