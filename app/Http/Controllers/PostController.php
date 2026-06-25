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
    $this->authorize('create', Post::class);
    return view('informacoes.create');
}


public function store(Request $request)
{
    $this->authorize('create', Post::class);
    
    $dadosValidados = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

   
    $dadosValidados['slug'] = Str::slug($dadosValidados['title']);

    Post::create($dadosValidados);

    return redirect()->route('posts.index')->with('sucesso', 'Notícia publicada com sucesso!');
}

public function edit(Post $post)
{
    $this->authorize('edit', $post);
    return view('informacoes.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);
    
    $dadosValidados = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $dadosValidados['slug'] = Str::slug($dadosValidados['title']);
    $post->update($dadosValidados);

    return redirect()->route('posts.index')->with('sucesso', 'Notícia atualizada com sucesso!');
}

public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    
    $post->delete();

    return redirect()->route('posts.index')->with('sucesso', 'Notícia excluída com sucesso!');
}


}

