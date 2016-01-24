<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'poyc'], function (Router $router) {

    $router->group(['prefix' => '{player}'], function (Router $router) {
        $router->get('debug', ['as' => 'poyc.player.debug', 'uses' => 'PagesController@getDebug']);
        $router->get('masteries', ['as' => 'poyc.player.masteries', 'uses' => 'PagesController@getMasteries']);
        $router->get('/', ['as' => 'poyc.player.basic', 'uses' => 'PagesController@getBasicData']);
    });

    $router->get('/', ['as' => 'pxcms.poyc.index', 'uses' => 'PagesController@getIndex']);
});
