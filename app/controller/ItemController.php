<?php
namespace cgsmith\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ItemController
 * @package cgsmith\controller
 *
 * Handles shopping list CRUD
 * @todo Look into setting request and app in abstract controller
 * @todo tie in middleware for auth
 * @todo throw proper exceptions for use cases
 */
class ItemController
{
    /**
     * Create action will get the create form or handle the post request
     *
     * @param Request $request
     * @param Application $app
     */
    public function createAction(Request $request, Application $app){
        return $app['twig']->render('index.twig');
    }

    /**
     * Update an item
     * @todo - check the functionality of updating this vs just creating a new entry if it doesnt exist and relating
     * @todo - the shoppinglist to the new uuid
     *
     * @param Request $request
     * @param Application $app
     */
    public function updateAction(Request $request, Application $app){}


}