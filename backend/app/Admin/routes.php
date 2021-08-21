<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\HomeController;
use App\Admin\Controllers\RecipeController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', [HomeController::class, 'index'])->name('adminhome');
    $router->resource('recipes', RecipeController::class);

});
