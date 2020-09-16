<?php
namespace classes;

use interfaces\MolluscKind;
use traits\CanCrawl;
use traits\HasFoot;

class Snail extends Animal implements MolluscKind {
    //Я создал разные трейты для улитки и червя потому что они ползут по разному.
    //Улитка с помощью своей "ноги" как моллюск, а червь скользя по земле, потому что он беспозвоночный
    use CanCrawl, HasFoot;

    public function name() {
        return $this->name;
    }

    function eat($animal = null)
    {
        return "Ест обычную пищу.";

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