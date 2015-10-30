<?php

namespace cgsmith\model;

/**
 * Class Item
 *
 * Items that can be associated with a list
 *
 * @package cgsmith\model
 */
class Item
{
    /**
     * @var string $id uuid of list
     */
    protected $id;

    /**
     * @var string $name list name
     */
    protected $name;

    /**
     * Constructs the object and performs validation
     *
     * generate uuid @todo move to an abstract model's constructor
     * @param $name
     */
    public function __construct($name) {
        // $this->validate(); // validate object and set properties
        // $this->save(); // persist somewhere
        // throw an exception if you cannot validate or persist
    }
}