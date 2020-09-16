<?php

namespace classes;

use interfaces\FishKind;
use traits\CanSwim;
use traits\HasFin;
use traits\HasLimbs;
use traits\IsPredator;


class Fish extends Animal implements FishKind {
    use CanSwim, HasFin, IsPredator;


    public function name() {
        return $this->name;
    }

    public function hunt(Animal ...$animal) {
        return $this->eat($animal);
    }

    function eat(array $animal)
    {

        $word = "";
        foreach ($animal as $key => $value)
        {
            $word .= " || ''$value'' ||";

            if ($value == $this->name())
                return "Нельзя кушать себя! :)";

        }
        return " Ест добычу: $word.";
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
