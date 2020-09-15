<?php


namespace classes;

use traits\CanCreep;
use interfaces\InvertebrateKind;

class Worm extends Animal implements InvertebrateKind {
    use CanCreep;

    public function name() {
        return $this->name;
    }

    function eat($animal = null)
    {
        return "Ест обычную пищу.";
    }

    function move()
    {
        return $this->creep();
    }

    function creep()
    {
        return " Ползёт. ";
    }
}