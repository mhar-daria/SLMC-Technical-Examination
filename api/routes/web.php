<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    // users
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'V1\UsersController@list');

        $router->group(['prefix' => '{userId}'], function () use ($router) {
            $router->get('/', 'V1\UsersController@find');

            $router->group(['prefix' => 'address'], function ($router) {
                $router->get('/', 'V1\AddressesController@find');
            });

            $router->group(['prefix' => 'company'], function ($router) {
                $router->get('/', 'V1\CompaniesController@find');
            });

            // posts
            $router->group(['prefix' => 'posts'], function ($router) {
                $router->get('/', 'V1\UserPostsController@list');
                $router->get('{postId}', 'V1\UserPostsController@find');
            });
        });
    });

    // posts
    $router->group(['prefix' => 'posts'], function () use ($router) {
        $router->get('/', 'V1\PostsController@list');
        $router->get('{postId}', 'V1\PostsController@find');
    });

    // todos
    $router->group(['prefix' => 'todos'], function () use ($router) {
        $router->get('/', 'V1\TodosController@list');
        $router->get('{todoId}', 'V1\TodosController@find');
    });
});
