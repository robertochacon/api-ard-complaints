<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\DepartamentsController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login/', [AuthController::class, 'login']);
Route::post('/register/', [AuthController::class, 'register']);

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/logout/', [AuthController::class, 'logout']);
    Route::post('/refresh/', [AuthController::class, 'refresh']);
    Route::post('/me/', [AuthController::class, 'me']);

    //type
    Route::get('/types/', [TypesController::class, 'index']);
    Route::get('/types/{id}/', [TypesController::class, 'watch']);
    Route::post('/types/', [TypesController::class, 'register']);
    Route::put('/typtypese/{id}/', [TypesController::class, 'update']);
    Route::delete('/types/{id}/', [TypesController::class, 'delete']);

    //departaments
    Route::get('/departaments/', [DepartamentsController::class, 'index']);
    Route::get('/departaments/{id}/', [DepartamentsController::class, 'watch']);
    Route::post('/departaments/', [DepartamentsController::class, 'register']);
    Route::put('/departaments/{id}/', [DepartamentsController::class, 'update']);
    Route::delete('/departaments/{id}/', [DepartamentsController::class, 'delete']);
    
    //complaints
    Route::get('/complaints/', [ComplaintsController::class, 'index']);
    Route::get('/complaints/history/', [ComplaintsController::class, 'history']);
    Route::get('/complaints/department/{department_id}', [ComplaintsController::class, 'all_by_department']);
    Route::get('/complaints/person/{identification}', [ComplaintsController::class, 'all_by_identification']);
    Route::get('/complaints/user/{user_id}', [ComplaintsController::class, 'all_by_user']);
    Route::get('/complaints/{id}/', [ComplaintsController::class, 'watch']);
    Route::post('/complaints/', [ComplaintsController::class, 'register']);
    Route::put('/complaints/{id}/', [ComplaintsController::class, 'update']);
    Route::delete('/complaints/{id}/', [ComplaintsController::class, 'delete']);

    //users
    Route::get('/users/', [UserController::class, 'index']);
    Route::get('/users/{id}/', [UserController::class, 'watch']);
    Route::put('/users/{id}/', [UserController::class, 'update']);
    Route::delete('/users/{id}/', [UserController::class, 'delete']);

    //records
    Route::get('/records/', [RecordsController::class, 'index']);
    Route::get('/records/{complaint_id}/', [RecordsController::class, 'watch']);
    Route::post('/records/', [RecordsController::class, 'register']);
    Route::delete('/records/{id}/', [RecordsController::class, 'delete']);

});
