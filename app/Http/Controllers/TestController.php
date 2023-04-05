<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
     function test()
    {
        /* Busca el id 1 dentro de la tabla de User y lo asigna a una variable*/
        $user = User::find(1);
        //Tipo de impresión del objeto de user
        //var_dump($user);

        return view('welcome', ['user'=>$user]);
    }

    public function index()
    {
        /* Retornar una vista .blade.php */
        return view("index",['name'=>'Claudio', 'age'=>21, 'html'=>"<h1>Titulo</h1>", 'array'=>[1,2,3,4,'Claudio']]);
    }
}
