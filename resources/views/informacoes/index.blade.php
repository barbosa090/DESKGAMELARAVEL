<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rede de Informações - DESKGAMELARAVEL</title>
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
        <div class="mb-10 text-center">
            <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-cyan-400 inline-block">
                Mundo Hardware & Tech
            </h2>
            <p class="text-gray-400 mt-2">Fique por dentro de reviews, lançamentos e notícias do universo gamer.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($posts as $post)
                <article class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden hover:border-purple-500 transition duration-300 flex flex-col justify-between p-6">
                    <div>
                        <span class="text-xs text-cyan-400 font-mono tracking-widest uppercase">Notícia • {{ $post->created_at->format('d/m/Y') }}</span>
                        <h3 class="text-2xl font-bold mt-2 mb-3 text-white hover:text-purple-400 transition">
                            <a href="/informacoes/{{ $post->slug }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-400 line-clamp-3 mb-4">
                            {{ Str::limit($post->content, 150) }}
                        </p>
                    </div>
                    <div>
                        <a href="/informacoes/{{ $post->slug }}" class="inline-flex items-center text-purple-400 font-bold hover:text-purple-300 transition">
                            Ler Artigo Completo <span class="ml-2">→</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-2 text-center py-12 bg-gray-900 border border-dashed border-gray-800 rounded-xl">
                    <p class="text-gray-500">Nenhuma notícia ou review publicado ainda.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>