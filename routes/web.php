<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacto', function () {
    return view('contacto/contacto');
})->name('contacto');


Route::get('/custom', function(){

    $mesj = "Mensaje desde el servidor *-*";
    $otro = ['msj' => $mesj, "edad"=>"15"];
    return view('custom', $otro);
    //return view('custom', ['msj' => $mesj, "edad"=>"15"]);
});

/* Usar el recurso del controlador: Test */
/* En el string le indicamos el nombre de la funcion que deseamos: 'test' */
Route::get('/test', [TestController::class, 'test']);

Route::get('/testIndex', [TestController::class, 'index']);
