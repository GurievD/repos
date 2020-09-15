<?php
namespace classes;

use interfaces\SpiderKind;
use traits\CanRun;
use traits\HasLimbs;
use traits\IsPredator;

class Spider extends Animal implements SpiderKind {
    use CanRun, HasLimbs, IsPredator;

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
        return $this->run();
    }


    function run()
    {
        return " Бежит. ";
    }
}