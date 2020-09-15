<?php
namespace classes;

use interfaces\MolluscKind;
use traits\CanCrawl;
use traits\HasFoot;

class Snail extends Animal implements MolluscKind {
    use CanCrawl, HasFoot;

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
        return $this->crawl();
    }

    function crawl()
    {
        return " Ползает. ";
    }
}