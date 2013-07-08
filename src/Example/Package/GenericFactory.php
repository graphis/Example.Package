<?php
namespace Example\Package;

class GenericFactory
{
    protected $map;

    public function __construct($map = [])
    {
        $this->map = $map;
    }

    public function newInstance($name)
    {
        if (! isset($this->map[$name])) {
            throw new \Exception("$name not mapped");
        }
        $factory = $this->map[$name];
        $model = $factory();
        return $model;
    }
}
