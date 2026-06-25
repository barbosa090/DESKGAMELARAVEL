<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESKGAME — Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-950 text-slate-100 font-sans">
    @include('partials.navbar')

    <main class="relative overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-72 bg-gradient-to-b from-slate-900 to-transparent pointer-events-none"></div>

        <section class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-16 lg:pt-20 lg:pb-24">
            <div class="grid gap-12 lg:grid-cols-[1.3fr_0.9fr] items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 rounded-full bg-cyan-500/10 px-4 py-2 text-sm text-cyan-300 ring-1 ring-cyan-500/20">
                        Nova coleção de setups hardware com foco em performance e estilo.
                    </div>
                    <div class="space-y-6">
                        <h1 class="text-5xl font-black tracking-tight sm:text-6xl lg:text-7xl text-white">
                            Sua loja gamer com visual premium e conteúdo atualizado.
                        </h1>
                        <p class="max-w-2xl text-slate-400 text-lg leading-8">
                            Explore produtos de alta performance, notícias quentes do universo tech e ofertas preparadas para montar o setup dos seus sonhos.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a href="/produtos" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-purple-500 to-cyan-400 px-6 py-3 text-base font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:scale-[1.01]">
                            Ir para a Loja
                        </a>
                        <a href="/informacoes" class="inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-900/90 px-6 py-3 text-base font-semibold text-slate-200 transition hover:border-cyan-400 hover:text-white">
                            Ler Notícias
                        </a>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2rem] border border-slate-800 bg-slate-900/90 shadow-2xl shadow-slate-950/40">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(56,189,248,0.18),_transparent_30%),_radial-gradient(circle_at_bottom_left,_rgba(168,85,247,0.2),_transparent_28%)]"></div>
                    <div class="relative p-8 sm:p-10 lg:p-12">
                        <div class="rounded-3xl bg-slate-950/80 p-6 ring-1 ring-slate-800">
                            <div class="flex items-center justify-between gap-4 mb-8">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Top Setup</p>
                                    <h2 class="mt-3 text-3xl font-black text-white">RTX 4090 + Ryzen 9</h2>
                                </div>
                                <span class="rounded-full bg-cyan-500/15 px-3 py-1 text-sm font-semibold text-cyan-200">+23% performance</span>
                            </div>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="rounded-3xl bg-slate-900/90 p-5">
                                    <p class="text-sm uppercase text-slate-400">Velocidade</p>
                                    <p class="mt-3 text-3xl font-black text-white">5.2ms</p>
                                </div>
                                <div class="rounded-3xl bg-slate-900/90 p-5">
                                    <p class="text-sm uppercase text-slate-400">Memória</p>
                                    <p class="mt-3 text-3xl font-black text-white">32GB DDR5</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between mb-8">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-400">Destaques da Loja</p>
                    <h2 class="mt-3 text-3xl font-black text-white">Escolha o setup ideal em segundos.</h2>
                </div>
                <a href="/produtos" class="text-cyan-300 hover:text-white text-sm font-semibold transition">Ver todos os produtos →</a>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                @foreach($produtos as $produto)
                    <article class="overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-xl shadow-slate-950/20 transition hover:-translate-y-1 hover:border-cyan-500/40">
                        <div class="flex items-center justify-between gap-3 mb-5">
                            <span class="rounded-full bg-slate-800/80 px-3 py-1 text-xs uppercase tracking-[0.24em] text-slate-400">Hardware</span>
                            <span class="text-sm font-semibold text-cyan-300">R$ {{ number_format($produto->price, 2, ',', '.') }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3 truncate">{{ $produto->name }}</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">{{ Str::limit($produto->description ?? 'Peça rígida e confiável para seu próximo build.', 110) }}</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="/produtos/{{ $produto->id }}" class="rounded-full bg-gradient-to-r from-purple-500 to-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:opacity-90">Detalhes</a>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full border border-slate-700 bg-slate-950/80 px-4 py-2 text-sm font-semibold text-slate-300 transition hover:border-red-500 hover:text-white">Excluir</button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between mb-8">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-purple-400">Feed de Informações</p>
                    <h2 class="mt-3 text-3xl font-black text-white">Notícias e tendências do universo gamer.</h2>
                </div>
                <a href="/informacoes" class="text-purple-300 hover:text-white text-sm font-semibold transition">Ver todas as notícias →</a>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                @foreach($posts as $post)
                    <article class="group overflow-hidden rounded-3xl border border-slate-800 bg-slate-900/95 p-6 shadow-xl shadow-slate-950/20 transition hover:-translate-y-1">
                        <div class="mb-4 text-sm uppercase tracking-[0.3em] text-cyan-300">Notícia</div>
                        <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-cyan-300 transition">{{ $post->title }}</h3>
                        <p class="text-slate-400 leading-relaxed mb-6">{{ Str::limit($post->content, 140) }}</p>
                        <a href="/informacoes/{{ $post->slug }}" class="inline-flex items-center gap-2 text-sm font-semibold text-purple-300 transition hover:text-purple-200">Ler mais <span>→</span></a>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-800 bg-slate-950/90 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-slate-500">
            DESKGAMELARAVEL © 2026 — todo mundo gamer, tudo muito épico.
        </div>
    </footer>
</body>
</html>