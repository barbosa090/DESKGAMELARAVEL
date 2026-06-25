<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); 
        return view('informacoes.index', compact('posts'));
    }

    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('informacoes.show', compact('post'));
    }
public function create()
{
    return view('informacoes.create');
}


public function store(Request $request)
{
    $dadosValidados = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

   
    $dadosValidados['slug'] = Str::slug($dadosValidados['title']);

    Post::create($dadosValidados);

    return redirect()->route('posts.index')->with('sucesso', 'Notícia publicada com sucesso!');
}



}

