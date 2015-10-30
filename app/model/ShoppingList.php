<?php
namespace cgsmith\model;

/**
 * Class ShoppingList
 *
 * A list of items
 *
 * @todo implement ramseys uuid
 * @package cgsmith\model
 */
class ShoppingList
{
    /**
     * @var string $id uuid of list
     */
    protected $id;

    /**
     * @var string $user uuid of user model
     */
    protected $user;

    /**
     * @var string $name list name
     */
    protected $name;

    /**
     * @var Item[] $items uuid of items
     */
    protected $items;

    /**
     * Constructs the object and performs validation
     *
     * generate uuid @todo move to an abstract model's constructor
     * @param $user
     * @param $name
     */
    public function __construct($user,$name) {
        // $this->validate(); // validate object and set properties
        // $this->save(); // persist somewhere
        // throw an exception if you cannot validate or persist
    }
}