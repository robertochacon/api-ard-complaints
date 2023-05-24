<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\DepartamentsController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::post('/register/', [AuthController::class, 'register']);
Route::post('/login/', [AuthController::class, 'login']);
Route::post('/refresh/', [AuthController::class, 'refresh']);
Route::post('/logout/', [AuthController::class, 'logout']);

Route::group(['middleware' => ['jwt.auth']], function() {
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'auth'
], function ($router) {

        //type
        Route::get('/types/', [TypesController::class, 'index']);
        Route::get('/type/{id}/', [TypesController::class, 'watch']);
        Route::post('/type/', [TypesController::class, 'register']);
        Route::put('/type/update/{id}/', [TypesController::class, 'update']);
        Route::delete('/type/delete/{id}/', [TypesController::class, 'delete']);

        //departaments
        Route::get('/departaments/', [DepartamentsController::class, 'index']);
        Route::get('/departament/{id}/', [DepartamentsController::class, 'watch']);
        Route::post('/departament/', [DepartamentsController::class, 'register']);
        Route::put('/departament/update/{id}/', [DepartamentsController::class, 'update']);
        Route::delete('/departament/delete/{id}/', [DepartamentsController::class, 'delete']);

        //complaints
        Route::get('/complaints/', [ComplaintsController::class, 'index']);
        Route::get('/complaints/person/{identification}', [ComplaintsController::class, 'all_by_identification']);
        Route::get('/complaints/user/{user_id}', [ComplaintsController::class, 'all_by_user']);
        Route::get('/complaint/{code}/', [ComplaintsController::class, 'watch']);
        Route::post('/complaint/', [ComplaintsController::class, 'register']);
        Route::put('/complaint/update/{id}/', [ComplaintsController::class, 'update']);
        Route::delete('/complaint/delete/{id}/', [ComplaintsController::class, 'delete']);

        //users
        Route::get('/users/', [UserController::class, 'index']);
        Route::get('/user/{id}/', [UserController::class, 'watch']);
        Route::put('/user/update/{id}/', [UserController::class, 'update']);
        Route::delete('/user/delete/{id}/', [UserController::class, 'delete']);

});