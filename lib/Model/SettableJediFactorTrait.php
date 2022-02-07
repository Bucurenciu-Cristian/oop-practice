<?php

namespace Model;

trait SettableJediFactorTrait
{
    private $jediFactor;

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    /**
     * @param mixed $jediFactor
     */
    public function setJediFactor($jediFactor): void
    {
        $this->jediFactor = $jediFactor;
    }

}