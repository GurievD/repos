<?php


use classes\Animal;
use classes\Eagle;
use classes\Fish;
use classes\Bear;
use classes\Fly;
use classes\Snail;
use classes\Spider;
use classes\Worm;

require_once "./autoload.php";

$eagle = new Eagle("Орёл");
$fish = new Fish("Рыба");
$bear = new Bear("Медведь");
$snail = new Snail("Улитка");
$spider = new Spider("Паук");
$animal = new Animal("Животное");
$worm = new Worm("Червь");
$fly = new Fly("Муха");


echo $eagle->name() . ' - ', $eagle->beak() . $eagle->betterEyes() . $eagle->predator() . $eagle->hunt($fish) . $eagle->move() . $eagle->sayFly() . "<br/>";
echo $fish->name()  . ' - ', $fish->fin() . $fish->hunt($worm) . $fish->move() . $fish->saySwim() . "<br/>";
echo $bear->name() . ' - ', $bear->paws() . $bear->hunt($fish) . $bear->move() . $bear->sayWalk() . "<br/>";
echo $snail->name() . ' - ', $snail->foot() . $snail->hunt($worm) . $snail->move() . $snail->sayCrawl() . "<br/>";
echo $spider->name() . ' - ', $spider->limbs() . $spider->predator() . $spider->hunt($fly) . $spider->move() . $spider->sayRun() . "<br/>";
echo $worm->name() . ' - ', $worm->creep() . $worm->eat() . $worm->sayCreep()  . "<br/>";
echo $fly->name() . ' - ', $fly->fly() . $fly->eat() . $fly->sayFly();