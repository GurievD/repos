<?php


namespace classes;

use traits\CanCreep;
use interfaces\InvertebrateKind;

class Worm extends Animal implements InvertebrateKind {
    //Я создал разные трейты для улитки и червя потому что они передвигаются по разному.
    //Улитка с помощью своей "ноги" как моллюск, а червь скользя по земле, потому что он беспозвоночный
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
        return " Ползает. ";
    }
}