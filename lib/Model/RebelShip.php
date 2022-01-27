<?php

class RebelShip extends Ship
{
    public function getFavoriteJedi()
    {
        $temp = array("Kicky", "Iooana","Teo", "Markus");
        $index = array_rand($temp);

        return $temp[$index];
    }
    public function isFunctional()
    {
        return true;
    }
    public function getType()
    {
        return 'Rebel';
    }
    public function getNameAndSpecs($useShortFormat = false)
    {
        if ($useShortFormat) {
            return sprintf(
                '%s: %s/%s/%s (REBEL)',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s (REBEL)',
                $this->getName(),
                $this->getWeaponPower(),
                $this->getJediFactor(),
                $this->getStrength()
            );
        }
    }
}