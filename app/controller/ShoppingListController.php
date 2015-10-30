<?php
namespace cgsmith\controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ShoppingListController
 * @package cgsmith\controller
 *
 * Handles shopping list CRUD
 * @todo Look into setting request and app in abstract controller
 * @todo tie in middleware for auth
 * @todo throw proper exceptions for use cases
 */
class ShoppingListController
{
    /**
     * Create action will get the create form or handle the post request
     *
     * @param Request $request
     * @param Application $app
     */
    public function createAction(Request $request, Application $app){
        //
        return $app['twig']->render('index.twig');
    }

    /**
     * Update the shopping list
     *
     * @param Request $request
     * @param Application $app
     */
    public function updateAction(Request $request, Application $app){}

    /**
     * Delete the shopping list
     *
     * @todo will need to iterate over items or mark as deleted
     * @param Request $request
     * @param Application $app
     */
    public function deleteAction(Request $request, Application $app){}

}