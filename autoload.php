<?php

spl_autoload_register(function ($name) {

    $path = "./kinds/$name.php";
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);

    if (file_exists($path))
        require_once $path;

});
