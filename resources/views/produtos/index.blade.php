<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - DESKGAMELARAVEL</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen">

    @include('partials.navbar')

    <main class="max-w-6xl mx-auto mt-10 p-4">
        @if(session('sucesso'))
    <div class="bg-green-900/50 border border-green-500 text-green-200 p-4 rounded-lg mb-6 flex items-center justify-between">
        <span> {{ session('sucesso') }}</span>
        <button onclick="this.parentElement.remove()" class="text-green-400 hover:text-green-200 font-bold">✕</button>
    </div>
@endif
        <h2 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400">
            Máquinas e Componentes Disponíveis
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($produtos as $produto)
                <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden shadow-lg p-5 hover:border-cyan-500 transition duration-300">
                    <div class="h-48 bg-gray-800 rounded-md mb-4 flex items-center justify-center text-gray-500">
                        [ Imagem do Hardware ]
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $produto['nome'] }}</h3>
                    <p class="text-cyan-400 text-lg font-extrabold mb-4">{{ $produto['preco'] }}</p>
                    <a href="/produtos/{{ $produto['id'] }}" class="block text-center bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition">
                        Ver Detalhes
                    </a>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Tem certeza que deseja excluir este hardware?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-xs text-center bg-red-950/40 hover:bg-red-600 border border-red-900/60 text-red-200 py-2 rounded font-bold transition">
                             Excluir Produto
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>