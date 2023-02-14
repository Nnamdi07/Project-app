<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PoliticalPartyController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/auth/register', [AuthController::class, 'register']);
// Route::post('/auth/login', [AuthController::class, 'login']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::group(['middleware'=>'auth:api',], function(){
    Route::post('vote',[PollController::class, 'add_ballot']);

    Route::get('/add-candidate',[PollController::class, 'add_candidate']);
    Route::post('/update-candidate',[PollController::class, 'update_candidate_info']);
    Route::post('/add-party',[PoliticalPartyController::class, 'add_party']);
    Route::post('/edit-party',[PoliticalPartyController::class, 'update_party_info']);
});