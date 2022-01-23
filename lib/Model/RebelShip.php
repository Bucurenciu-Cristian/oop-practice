<?php

class RebelShip extends Ship
{
    public function getFavoriteJedi()
    {
        $temp = array("Kicky", "Iooana","Teo", "Markus");
        $index = array_rand($temp);

        return $temp[$index];
    }
}