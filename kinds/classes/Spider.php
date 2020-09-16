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
        return $this->run();
    }


    function run()
    {
        return " Бежит. ";
    }
}