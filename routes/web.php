<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\TestController;
use App\Http\Middleware\TestMiddleware;

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
    /* return view('welcome'); */
    echo "welcome";
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/contacto', function () {
    return view('contacto/contacto');
})->name('contacto');


Route::get('/custom', function () {

    $mesj = "Mensaje desde el servidor *-*";
    $otro = ['msj' => $mesj, "edad" => "15"];
    return view('custom', $otro);
    //return view('custom', ['msj' => $mesj, "edad"=>"15"]);
});

/* Usar el recurso del controlador: Test */
/* En el string le indicamos el nombre de la funcion que deseamos: 'test' */
Route::get('/test', [TestController::class, 'test']);

Route::get('/testIndex', [TestController::class, 'index']);


/* Route::get('/test/{id}/{name}',  function ($id, $name) {
    echo $id;
    echo $name;
});
 */

/* Route::get('/test/{id?}/{name?}',  function($id=10, $name="claudio"){
    echo $id;
    echo $name;
});
 */

/* Route::get('/category/{id}',  [CategoryController::class, 'new']);
 */

//podemos meterle mas funciones aparte de prefix, como middlewares o varias cosas (checar documentacióm)
Route::group(['prefix' => 'dashboard', 'middleware'=> ['auth', "admin"]], function (){
   /*  Route::resource('post', PostController::class)->only(['show']);
    Route::resource('category', CategoryController::class)->except(['show']); */
    Route::get('/', function () {
        return view('dashboard');
    })->name("dashboard");


    Route::resources([
        'post'=> PostController::class,
        'category'=>CategoryController::class
    ]);



});

/* Route::middleware([TestMiddleware::class])->group(function ()
{
    Route::get('/test/{id?}/{name?}',  function($id=10, $name="claudio"){
        echo $id;
        echo $name;
    });
}); */

/* Route::controller(PostController::class)->group(function () {
    Route::get('post', 'index')->name("post.index");
    Route::get('post/{post}', 'show')->name("post.show");
    Route::get('post/create', 'create')->name("post.create");
    Route::get('post/{post}/edit',  'edit')->name("post.edit");

    Route::post('post',  'store')->name("post.store");
    Route::put('post/{post}', 'update')->name("post.update");
    Route::delete('post/{post}',  'delete')->name("post.destroy");
}); */

/* Route::get('post', [PostController::class, 'index']);
Route::get('post/{post}', [PostController::class, 'show']);
Route::get('post/create', [PostController::class, 'create']);
Route::get('post/{post}/edit', [PostController::class, 'edit']);

Route::post('post', [PostController::class, 'store']);
Route::put('post/{post}', [PostController::class, 'update']);
Route::delete('post/{post}', [PostController::class, 'delete']); */
