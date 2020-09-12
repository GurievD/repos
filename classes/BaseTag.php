<?php


use Tag\Attributes;
use Tag\Body;
use Tag\Name;

abstract class BaseTag
{

    protected $name;
    protected $attributes;
    protected $body;

    public function __construct($name, $attributes = [], Body $body = null)
    {

        if (!$name instanceof Name)
            $name = new Name($name);

        if (!$attributes instanceof Attributes)
            $attributes = new Attributes($attributes);

        if (!$body)
            $body = new Body();

        $this->name = $name;
        $this->attributes = $attributes;
        $this->body = $body;
    }

    function name(): Name {
        return $this->name;
    }

    function isClosing() {
        return $this->name()->isClosing();
    }

    function isSelfClosing() {
        return $this->name()->isSelfClosing();
    }

    function body(): Body {
        return $this->body;
    }

    function appendBody($value) {
        $this->body()->append($value);
        return $this;
    }

    function prependBody($value) {
        $this->body()->prepend($value);
        return $this;
    }

    function clearBody() {
        $this->body()->clear();
        return $this;
    }

    function attributes(): Attributes {
        return $this->attributes;
    }

    function setAttributes(array $attributes) {
        $this->attributes()->set($attributes);
        return $this;
    }

    function getAttributes() {
        return $this->attributes()->toArray();
    }

    function clearAttributes() {
        $this->attributes()->clear();
        return $this;
    }

    function setAttribute(string $key, $value) {
        $this->attributes()->set($key, $value);
        return $this;
    }

    function getAttribute(string $key) {
        return $this->attributes()->get($key);
    }

    function appendAttribute(string $key, $value) {
        $this->attributes()->append($key, $value);
        return $this;
    }

    function prependAttribute(string $key, $value) {
        $this->attributes()->prepend($key, $value);
        return $this;
    }

    function deleteAttribute(string $key) {
        $this->attributes()->delete($key);
        return $this;
    }

    function appendTo(BaseTag $tag) {
        $tag->appendBody($this);
        return $this;
    }

    function prependTo(BaseTag $tag) {
        $tag->prependBody($this);
        return $this;
    }

    function toString() {
        $tag = "<" . $this->name() . $this->attributes();

        if ($this->isSelfClosing())
            $tag .= " />";
        else
            $tag .= ">" . $this->body() . "</" . $this->name() . ">";

        return $tag;
    }

    function __call(string $name, array $arguments): self
    {
        $this->attributes()->$name(... $arguments);
        return $this;
    }

    function __set(string $name, $value)
    {
        $this->attributes()->$name = $value;
    }

    function __get(string $name)
    {
        return $this->attributes()->$name;
    }

    function __isset(string $key)
    {
        return isset($this->attributes()->$key);
    }

    function __unset(string $key)
    {
        unset($this->attributes()->$key);
    }

    function __toString()
    {
        return $this->toString();
    }

}
