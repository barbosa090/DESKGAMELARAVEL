<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - DESKGAMELARAVEL</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen">

    <header class="bg-gray-900 border-b border-gray-800 p-5">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-purple-500 tracking-wider">DESK<span class="text-cyan-400">GAME</span></h1>
            <nav class="space-x-4">
                <a href="#" class="text-gray-300 hover:text-cyan-400">Home</a>
                <a href="/produtos" class="text-cyan-400 font-bold">Loja</a>
                <a href="#" class="text-gray-300 hover:text-cyan-400">Informações</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto mt-10 p-4">
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
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>