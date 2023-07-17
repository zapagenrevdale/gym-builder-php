<?php

namespace Model\Email;

class Entity
{
    public $address;
    public $name;

    public function __construct($address, $name)
    {
        $this->address = $address;
        $this->name = $name;
    }
}