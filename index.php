<?php

use Tag\Doctype;

require_once "./autoload.php";


echo Doctype::get('HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"');

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