<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias DESKGAME</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-950 text-slate-100 font-sans">
    @include('partials.navbar')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(session('sucesso'))
            <div class="mb-8 rounded-3xl border border-emerald-500/20 bg-emerald-500/10 p-5 text-emerald-200 shadow-inner shadow-emerald-500/10">
                <div class="flex items-center justify-between gap-4">
                    <p class="text-sm font-semibold">{{ session('sucesso') }}</p>
                    <button onclick="this.parentElement.parentElement.remove()" class="rounded-full bg-emerald-500/10 px-3 py-1 text-sm text-emerald-100 transition hover:bg-emerald-500/20">Fechar</button>
                </div>
            </div>
        @endif

        <section class="rounded-[2rem] border border-slate-800 bg-slate-900/95 p-10 shadow-2xl shadow-slate-950/30 mb-12">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.3em] text-purple-300">Informações</p>
                <h1 class="mt-4 text-4xl font-black text-white sm:text-5xl">As notícias e análises que todo gamer precisa ler.</h1>
                <p class="mt-5 text-slate-400 leading-8">Acompanhe lançamentos, comparativos e tendências em hardware com um layout limpo e fácil de navegar.</p>
                @auth
                    @if(auth()->user()->is_admin)
                        <div class="mt-8">
                            <a href="{{ route('posts.create') }}" class="rounded-full bg-gradient-to-r from-purple-500 to-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:opacity-90 inline-block">+ Nova Notícia</a>
                        </div>
                    @endif
                @endauth
            </div>
        </section>

        <div class="grid gap-6 lg:grid-cols-2">
            @forelse($posts as $post)
                <article class="overflow-hidden rounded-[2rem] border border-slate-800 bg-slate-900/95 p-8 shadow-xl shadow-slate-950/20 transition hover:-translate-y-1">
                    <div class="flex items-center justify-between gap-4 mb-5">
                        <span class="text-xs uppercase tracking-[0.3em] text-cyan-300">{{ $post->created_at->format('d/m/Y') }}</span>
                        <span class="rounded-full bg-slate-800 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-400">Notícia</span>
                    </div>
                    <h2 class="text-3xl font-black text-white mb-4 hover:text-purple-300 transition">{{ $post->title }}</h2>
                    <p class="text-slate-400 leading-relaxed mb-6">{{ Str::limit($post->content, 150) }}</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="/informacoes/{{ $post->slug }}" class="inline-flex items-center gap-2 text-sm font-semibold text-purple-300 transition hover:text-purple-200">Ler notícia <span>→</span></a>
                        @auth
                            @if(auth()->user()->is_admin)
                                <a href="{{ route('posts.edit', $post) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-300 transition hover:text-blue-200">Editar</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-semibold text-red-300 transition hover:text-red-200">Excluir</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </article>
            @empty
                <div class="rounded-[2rem] border border-slate-800 bg-slate-900/95 p-8 text-slate-400">Nenhuma notícia publicada ainda. Volte mais tarde.</div>
            @endforelse
        </div>
    </main>
</body>
</html>