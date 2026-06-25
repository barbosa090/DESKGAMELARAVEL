<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
  
  $produtos = [
            ['id' => 1, 'nome' => 'PC Gamer RTX 4060', 'price' => 4500, 'description' => 'Placa de vídeo RTX 4060 com desempenho premium para jogos atuais.'],
            ['id' => 2, 'nome' => 'Monitor 144Hz IPS', 'price' => 1200, 'description' => 'Monitor 144Hz com painel IPS e cores precisas para gaming e trabalho.'],
        ];
  return view('produtos.index', compact('produtos'));
  
  }



  public function show($id)
    {
        return view('produtos.show', ['id' => $id]);

}
public function create()
{
      $this->authorize('create', Product::class);
      return view('produtos.create');
  }

  public function store(Request $request)
  {
      $this->authorize('create', Product::class);
      
      $dadosValidados = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    Product::create($dadosValidados);

    
    return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso!');
}

public function edit(Product $product)
{
    $this->authorize('edit', $product);
    return view('produtos.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $this->authorize('update', $product);
    
    $dadosValidados = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $product->update($dadosValidados);

    return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso!');
}

public function destroy(Product $product)
{
    $this->authorize('delete', $product);
    
    $product->delete();

    return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído com sucesso!');
}





}

