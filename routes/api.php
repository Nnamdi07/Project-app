<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;
use App\Models\PoliticalParty;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('vote',[PollController::class, 'add_ballot']);

Route::get('/add-candidate',[PollController::class, 'add_candidate']);
Route::post('/update-candidate',[PollController::class, 'update_candidate_info']);
Route::get('/add-party',[PoliticalParty::class, 'add_party']);
Route::get('/edit-party',[PollController::class, 'update_party_info']);