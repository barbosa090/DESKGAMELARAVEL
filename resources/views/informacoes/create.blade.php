<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Notícia - DESKGAMELARAVEL</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <header class="bg-gray-900 border-b border-gray-800 p-5">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-purple-500">Painel <span class="text-cyan-400">Notícias</span></h1>
            <a href="/informacoes" class="text-gray-400 hover:text-cyan-400 text-sm">← Voltar para o Feed</a>
        </div>
    </header>

    <main class="max-w-2xl mx-auto w-full my-10 p-6 bg-gray-900 border border-gray-800 rounded-xl shadow-2xl">
        <h2 class="text-2xl font-black mb-6 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400">
            Escrever Novo Artigo / Review
        </h2>

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-bold mb-2 text-gray-300">Título da Notícia</label>
                <input type="text" name="title" required placeholder="Ex: Rumores apontam especificações do novo processador gamer" 
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-gray-100 focus:outline-none focus:border-purple-500 transition">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2 text-gray-300">Conteúdo do Artigo (Texto Completo)</label>
                <textarea name="content" rows="8" required placeholder="Escreva aqui toda a matéria, análise ou novidade sobre o hardware..." 
                    class="w-full bg-gray-950 border border-gray-800 rounded-lg px-4 py-3 text-gray-100 focus:outline-none focus:border-purple-500 transition"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-cyan-500 hover:from-purple-700 hover:to-cyan-600 text-white font-black py-3 px-6 rounded-lg uppercase tracking-wider transition duration-300">
                    Publicar Matéria na Rede
                </button>
            </div>
        </form>
    </main>

    <footer class="text-center p-4 text-gray-600 text-xs">
        DESKGAMELARAVEL &copy; 2026
    </footer>

</body>
</html>