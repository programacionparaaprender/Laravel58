<?php

namespace EditorialWeb\Http\Controllers;

use EditorialWeb\User;
use EditorialWeb\Post;
use Illuminate\Http\Request;
use DB;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $post = Post::All();
            //$post = DB::select('select top 100 * from posts');
            return view('post.index', ['post' => $post]);    
        }else 
            return view('welcome');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['autores' => User::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'id_autor' => 'required',
            'contenido' => 'required'
        ]);
        Post::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'estado' => 1,
            'id_autor' => $request->id_autor
        ]);
        $post = Post::All();
        //$post = DB::select('select top 100 * from posts');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \EditorialWeb\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \EditorialWeb\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $autores = User::All();
        return view('post.edit', ['post' => $post, 'autores' => $autores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \EditorialWeb\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all());
         $request->validate([
            'titulo' => 'required',
            'id_autor' => 'required',
            'contenido' => 'required'
        ]); 
         $post->titulo = $request->titulo;
        $post->id_autor = $request->id_autor;  
        $post->contenido = $request->contenido;  
        //$post->save();
        /*
        $post2 = Post::find($post->id);
        $post2->titulo = $request->titulo;
        $post2->id_autor = $request->id_autor;  
        $post2->contenido = $request->contenido;
        $post2->save(); */
        DB::table('posts')
                ->where('id', $post->id)
                ->update(['titulo' => $post->titulo, 'id_autor' => $post->id_autor, 'contenido' => $post->contenido]);
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \EditorialWeb\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //dd($post->all());
        $post->estado = 0;
        $post->delete();
        return redirect(route('post.index'));
    }

    public function eliminar(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]); 
        //dd($post->all());
        return 'funciona eliminar';
    }

}
