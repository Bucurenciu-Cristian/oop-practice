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
        $val = PARENT::getNameAndSpecs($useShortFormat);
        return $val . ' (Rebel)';
    }
}