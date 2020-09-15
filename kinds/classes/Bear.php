<?php
namespace classes;


use interfaces\MammalKind;
use traits\CanWalk;
use traits\HasPaws;

class Bear extends Animal implements MammalKind {
    use CanWalk, HasPaws;

    public function name() {
        return $this->name;
    }

    public function hunt(Animal $animal) {
        return $this->eat($animal);
    }

    function eat($animal)
    {
        return " Ест добычу $animal. ";

    }

    function move()
    {
        return $this->walk();
    }

    function walk()
    {
        return " Ходит. ";
    }
}