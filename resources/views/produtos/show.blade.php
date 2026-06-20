<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen flex flex-col justify-between">

    <header class="bg-gray-900 border-b border-gray-800 p-5">
        <div class="max-w-6xl mx-auto">
            <a href="/produtos" class="text-cyan-400 hover:underline">← Voltar para a Loja</a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto bg-gray-900 border border-gray-800 p-8 rounded-xl my-10 shadow-2xl flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/2 h-64 bg-gray-800 rounded-lg flex items-center justify-center text-gray-500">
            [ Foto do Computador ID: {{ $id }} ]
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-between">
            <div>
                <span class="bg-purple-900 text-purple-300 text-xs px-2 py-1 rounded font-bold uppercase tracking-wider">Disponível</span>
                <h2 class="text-3xl font-black mt-2 mb-4">PC Gamer Setup ID: {{ $id }}</h2>
                <p class="text-gray-400 leading-relaxed">Configuração premium montada para rodar todos os jogos atuais no máximo em 1080p/4K. Inclui refrigeração otimizada e cabo organizer.</p>
            </div>
            <div class="mt-6">
                <button class="w-full bg-cyan-500 hover:bg-cyan-600 text-gray-950 font-black py-3 px-6 rounded-lg uppercase tracking-wide transition">
                    Adicionar ao Carrinho
                </button>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 text-center p-4 text-gray-500 text-sm">
        DESKGAMELARAVEL &copy; 2026
    </footer>

</body>
</html>