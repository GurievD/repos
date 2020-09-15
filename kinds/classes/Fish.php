<?php

namespace classes;

use interfaces\FishKind;
use traits\CanSwim;
use traits\HasFin;


class Fish extends Animal implements FishKind {
    use CanSwim, HasFin;

    public function name() {
        return $this->name;
    }

    public function hunt(Animal $animal) {
        return $this->eat($animal);
    }

    function eat($animal)
    {
        return "Ест добычу $animal.";

    }

    function move()
    {
        return $this->swim();
    }

    function swim()
    {
        return " Плавает. ";
    }
}
