<?php

/*
|--------------------------------------------------------------------------
|  Module Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Modules\Importer\Controller', 'prefix' => 'api/'], function () {
    Route::group(['prefix' => 'player'], function () {
        Route::get('/list', 'ImporterController@list')
            ->name('player.list');
        Route::get('/details/{id}', 'ImporterController@details')
            ->name('player.details');
        Route::post('/populate', 'ImporterController@populate')
            ->name('player.populate');
    });
});
