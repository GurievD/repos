<?php

namespace classes;

use interfaces\InsectKind;
use traits\CanFly;

class Fly extends Animal implements InsectKind {
    use CanFly;

    public function name() {
        return $this->name;
    }

    function eat($animal = null)
    {
        return "Ест обычную пищу.";
    }

    function move()
    {
        return $this->fly();
    }

    function fly()
    {
        return " Летит. ";
    }
}