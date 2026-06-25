@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-lg border border-slate-800 bg-slate-900/95 p-8 shadow-xl">
        <h1 class="text-3xl font-black text-white mb-8">Editar Produto</h1>

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-500/20 bg-red-500/10 p-4 text-red-200">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produtos.update', $product) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Nome do Produto</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $product->name) }}"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                    required
                >
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-300 mb-2">Descrição</label>
                <textarea 
                    id="description" 
                    name="description"
                    rows="4"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                    required
                >{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-semibold text-slate-300 mb-2">Preço (R$)</label>
                    <input 
                        type="number" 
                        id="price" 
                        name="price" 
                        value="{{ old('price', $product->price) }}"
                        step="0.01"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                        required
                    >
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-slate-300 mb-2">Estoque</label>
                    <input 
                        type="number" 
                        id="stock" 
                        name="stock" 
                        value="{{ old('stock', $product->stock) }}"
                        class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                        required
                    >
                </div>
            </div>

            <div class="flex gap-4">
                <button 
                    type="submit"
                    class="flex-1 rounded-lg bg-gradient-to-r from-purple-500 to-cyan-400 px-6 py-3 font-semibold text-slate-950 transition hover:opacity-90"
                >
                    Atualizar Produto
                </button>
                <a 
                    href="{{ route('produtos.index') }}"
                    class="flex-1 rounded-lg border border-slate-700 bg-slate-800 px-6 py-3 text-center font-semibold text-slate-300 transition hover:border-slate-600"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
