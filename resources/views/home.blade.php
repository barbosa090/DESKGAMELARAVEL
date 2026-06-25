<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESKGAMELARAVEL - Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen">
    @include('partials.navbar')
    <section class="relative bg-gray-900 border-b border-gray-800 py-20 px-5 text-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 to-cyan-900/20 pointer-events-none"></div>
        <div class="max-w-4xl mx-auto relative z-10">
            <h1 class="text-5xl md:text-6xl font-black tracking-wider uppercase mb-4">
                DESK<span class="text-cyan-400">GAME</span>
            </h1>
            <p class="text-xl text-gray-400 mb-8 max-w-xl mx-auto">
                O ecossistema definitivo para entusiastas de hardware. Compre setups insanos e consuma informação de alto nível.
            </p>
            <div class="flex justify-center gap-4">
                <a href="/produtos" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg shadow-purple-500/20">
                    Ir para a Loja
                </a>
                <a href="/informacoes" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 text-gray-300 font-bold py-3 px-6 rounded-lg transition">
                    Ver Notícias
                </a>
            </div>
        </div>
    </section>

    <main class="max-w-6xl mx-auto my-16 p-4 space-y-16">
        
        <div>
            <div class="flex justify-between items-end mb-6">
                <h2 class="text-2xl font-bold border-l-4 border-cyan-400 pl-3">Destaques da Loja</h2>
                <a href="/produtos" class="text-cyan-400 hover:underline text-sm">Ver todos →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($produtos as $produto)
                    <div class="bg-gray-900 border border-gray-800 p-5 rounded-lg">
                        <h3 class="font-bold text-lg mb-1 truncate">{{ $produto->name }}</h3>
                        <p class="text-cyan-400 font-extrabold mb-3">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
                        <a href="/produtos/{{ $produto->id }}" class="text-xs block text-center bg-gray-800 hover:bg-purple-600 py-2 rounded font-bold transition">Ver Máquina</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="flex justify-between items-end mb-6">
                <h2 class="text-2xl font-bold border-l-4 border-purple-500 pl-3">Feed de Informações</h2>
                <a href="/informacoes" class="text-purple-400 hover:underline text-sm">Ver todas →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                    <div class="bg-gray-900 border border-gray-800 p-6 rounded-xl flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-xl text-white mb-2 hover:text-cyan-400"><a href="/informacoes/{{ $post->slug }}">{{ $post->title }}</a></h3>
                            <p class="text-gray-400 text-sm line-clamp-2">{{ $post->content }}</p>
                        </div>
                        <a href="/informacoes/{{ $post->slug }}" class="text-xs text-purple-400 font-bold mt-4 block">Ler mais →</a>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    <footer class="bg-gray-900 border-t border-gray-800 text-center p-6 text-gray-500 text-sm">
        DESKGAMELARAVEL &copy; 2026
    </footer>

</body>
</html>