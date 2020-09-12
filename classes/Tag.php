<?php


class Tag extends BaseTag
{

    static function __callStatic(string $name, array $arguments) {
        return new static($name, ... $arguments);
    }

}
