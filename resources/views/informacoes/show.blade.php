<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - DESKGAMELARAVEL</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    <header class="bg-gray-900 border-b border-gray-800 p-5">
        <div class="max-w-4xl mx-auto">
            <a href="/informacoes" class="text-cyan-400 hover:underline">← Voltar para as Notícias</a>
        </div>
    </header>

    <main class="max-w-3xl mx-auto w-full my-10 p-6 md:p-10 bg-gray-900 border border-gray-800 rounded-xl shadow-2xl">
        <article>
            <span class="text-xs text-purple-400 font-mono tracking-widest uppercase block mb-2">
                Publicado em {{ $post->created_at->format('d/m/Y \à\s H:i') }}
            </span>

            <h1 class="text-3xl md:text-4xl font-black mb-6 text-white leading-tight">
                {{ $post->title }}
            </h1>

            <div class="h-1 w-20 bg-gradient-to-r from-purple-500 to-cyan-400 mb-8 rounded"></div>

            <div class="text-gray-300 text-lg leading-relaxed space-y-6">
                <p>{{ $post->content }}</p>
            </div>
        </article>
    </main>

    <footer class="bg-gray-900 border-t border-gray-800 text-center p-4 text-gray-500 text-sm">
        DESKGAMELARAVEL &copy; 2026
    </footer>

</body>
</html>