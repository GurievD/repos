<?php


require_once "./autoload.php";

$tag = new Tag('a');
$tag2 = new Tag('a');

$tag
    ->setAttribute('href', 'http://google.com')
    ->appendBody('Google');

$tag2
    ->setAttribute('href', 'https://www.php.net/manual/en/')
    ->appendBody('PHP документация');

echo $tag . "<br/>";
echo $tag2 . "<br/>";