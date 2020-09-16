<?php
namespace classes;


use interfaces\MammalKind;
use traits\CanWalk;
use traits\HasPaws;
use traits\IsPredator;

class Bear extends Animal implements MammalKind {
    use CanWalk, HasPaws, IsPredator;

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
        return $this->walk();
    }

    function walk()
    {
        return " Ходит. ";
    }
}