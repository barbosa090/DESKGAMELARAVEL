<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
  
  $produtos = [
            ['id' => 1, 'nome' => 'PC Gamer RTX 4060', 'preco' => 'R$ 4.500'],
            ['id' => 2, 'nome' => 'Monitor 144Hz IPS', 'preco' => 'R$ 1.200'],
        ];
  return view('produtos.index', compact('produtos'));
  
  }



  public function show($id)
    {
        return view('produtos.show', ['id' => $id]);

}

}

