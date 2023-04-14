<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //return route("post.create");
        //return redirect("/post/create");
        //return redirect()->route("post.create");
        //return to_route("post.create");
       /*  dd(Category::find(1)->posts); */
        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /*  User:get()->where(); */
       /* $categories= Category::get(); */
       $categories= Category::pluck('id', 'title');
       $post = new Post();
       /* dd($categories[0]->title); */
        echo view('dashboard.post.create', compact('categories', 'post'));

    }

    /**
     * Store a newly created resource in storage.
     * StoreRequest
     * Request
     */
    public function store(StoreRequest $request)
    {
        /* var_dump( $request); */
        //Funcion para hacer debug
        /* dd($request); */
        //echo request("title");
       /*  echo $request->input("slug"); */
       /* dd( $request->all()); */

     /*   $validated = $request->validate(
        [
            "title"=>"required|min:5|max:100",
            "slug"=>"required|min:5|max:100",
            "content"=>"required|min:7",
            "category_id"=>"required|integer",
            "description"=>"required|min:7",
            "posted"=>"required"
        ]
       ); */
       /*  $validated= Validator::make($request->all(),StoreRequest::myRules());

        dd($validated->errors()); */
       /* $validated = $request->validate(StoreRequest::myRules()); */
        /* $data =array_merge($request->all(), ['image'=> '']); */
        /* dd($request->validated()['slug']="hola mundo"); */
       /*  $data = $request->validated(); */
        //darle formato al slug
        // si el titulo es Hola Mundo Laravel
        // en el slug se formateara como hola-mundo-laravel
       /*  $data['slug']=Str::slug($data['title']);
        dd($data); */
        Post::create(  $request->validated());
        return to_route("post.index")->with('status','registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        echo view('dashboard.post.show', compact( 'post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories= Category::pluck('id', 'title');

        /* dd($categories[0]->title); */
         echo view('dashboard.post.edit', compact('categories', 'post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])){
            //dd($request->image);
            /* dd($request->validated()["image"]->hashName()); */
           /*  dd($request->validated()["image"]->getClientOriginalName()); */
           /* dd($request->validated()["image"]->extension()); */
           $data["image"] = $filename = time().".".$data["image"]->extension();
           /*  dd($filename); */
           $request->image->move(public_path("image/otro"), $filename);
        }
        $post->update($data);
      /*   $request->session()->flash('status','registro actualizado');
        $request->session()->flash('ass','registro actualizado');
        $request->session()->flash('form','registro actualizado');
        $request->session()->flash('msj','registro actualizado');*/
        return to_route("post.index")->with('status','registro actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status','registro eliminado');

    }
}
