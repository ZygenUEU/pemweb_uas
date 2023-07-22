<?php

use App\Http\Controllers\Admin\PasienRumahSakitController;
use App\Http\Controllers\AuthController;

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
//     // Book
//     Route::apiResource('books', 'BookApiController');

//     // PasienRumahSakit
//     Route::apiResource('pasien_rumah_sakit', 'PasienRumahSakitApiController');
// });

Route::get('/testapi', function(){
    return 'mencoba api';
});

//Public Route
Route::post('/registerapi', [AuthController::class, 'register']);
Route::post('/loginapi', [AuthController::class, 'login']);

//Protected Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/pasien', [PasienRumahSakitController::class, 'indexAPI']);
    Route::get('/pasien/{id}', [PasienRumahSakitController::class, 'showAPI']);
    Route::get('/pasien/search/{gamename}', [PasienRumahSakitController::class, 'searchAPI']);
    Route::post('/pasien', [PasienRumahSakitController::class, 'storeAPI']);
    Route::put('/pasien/{id}', [PasienRumahSakitController::class, 'updateAPI']);
});
