<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => '\App\Modules\Importer\Controller', 'prefix' => 'v1/importer/'], function () {
    Route::group(['prefix' => 'player'], function () {
        Route::get('/', 'ImporterController@list')
            ->name('importer.player.list');
        Route::get('/{player}', 'ImporterController@details')
            ->name('importer.player.details');
        Route::post('/', 'ImporterController@populate')
            ->name('importer.player.populate');
    });
});
