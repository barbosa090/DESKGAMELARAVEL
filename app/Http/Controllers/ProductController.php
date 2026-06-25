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
public function create()
{
    return view('produtos.create');
}

public function store(Request $request)
{
   
    $dadosValidados = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    Product::create($dadosValidados);

    
    return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído com sucesso!');
}





}

