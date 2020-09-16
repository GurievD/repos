<?php
namespace classes;


use interfaces\BirdKind;
use traits\CanFly;
use traits\HasBeak;
use traits\HasBetterEyes;
use traits\IsPredator;

class Eagle extends Animal implements BirdKind {
    use CanFly, HasBetterEyes, IsPredator, HasBeak;



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
        return $this->fly();
    }

    function fly()
    {
       return " Летит. ";
    }
}


