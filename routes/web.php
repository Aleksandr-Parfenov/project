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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return 'главная страница сайта';
});
Route::get('/posts/', function () {
    return 'список постов';
});

Route::get('/page/show/{param}', [PageController::class, 'show'])
    ->where('param', '[0-9]+');
Route::get('/page/show/', [PageController::class, 'show']);
Route::get('/page/all', [PageController::class, 'all']);

Route::get('/sum/{x1}/{x2}', [PageController::class, 'sum'])
    ->where(['x1'=>'[0-9]+', 'x2'=>'[0-9]+']);

Route::get('/worker/{param}/{id}', [\App\Http\Controllers\EmployeeController::class, 'show'])
    ->where(['param' => '[a-z]+', 'id' => '[0-9]+']);
Route::get('/worker/{id}', [\App\Http\Controllers\EmployeeController::class, 'showOne'])
    ->where('id', '[0-9]+');



Route::get('/articles/{date}', function ($date) {
    return "дата $date";
})->where('date','20[0-9][0-9]-[0-9][0-2]?-(3[0-2]|[1-2][0-9]|[0-9])');

Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    $date = $year . '-' . $month . '-' . $day;
    $dateUnix = strtotime($date);
    $dayWeek = date('N', $dateUnix);
    return " дата $date дата юник $dateUnix день недели $dayWeek";
})->where(['year' => '20[0-9][0-9]', 'month' => '[0-9][0-2]?', 'day' => '0?(3[0-2]|[1-2][0-9]|[0-9])']);

Route::get('/{user}/{id?}', function ($user, $id = 0) {
    if ($id) {
        return "пользователь $user номер $id";
    }
    return "Не указан номер пользователя";
})->where(['user' => '[a-z]{1,10}', 'id' =>'[0-9]+']);

