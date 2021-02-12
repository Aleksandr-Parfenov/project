<?php

use App\Http\Controllers\PageController;
//use \App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return 'главная страница сайта';
});

Route::any('/user/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::any('/user/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::any('/user/cabinet', [\App\Http\Controllers\UserController::class, 'cabinet']);


Route::get('/page/show/{param}', [PageController::class, 'show'])
    ->where('param', '[0-9]+');

//Route::get('/{user}/{id?}', function ($user, $id = 0) {
//    if ($id) {
//        return "пользователь $user номер $id";
//    }
//    return "Не указан номер пользователя";
//})->where(['user' => '[a-z]{1,10}', 'id' =>'[0-9]+']);

