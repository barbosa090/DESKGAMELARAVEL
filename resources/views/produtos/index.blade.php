<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja DESKGAME</title>
    @vite('resources/css/app.css')
    @include('partials.fallback-styles')
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

        <section class="rounded-[2rem] border border-slate-800 bg-slate-900/95 p-8 shadow-2xl shadow-slate-950/30">
            <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Loja oficial DESKGAME</p>
                    <h1 class="mt-4 text-4xl font-black tracking-tight text-white sm:text-5xl">Encontre hardware gamer pronto para elevar seu setup.</h1>
                    <p class="mt-5 max-w-2xl text-slate-400 leading-8">Tudo em um só lugar: componentes, máquinas completas e um feed de notícias para você acompanhar as tendências do mundo gamer.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="/produtos" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-purple-500 to-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-cyan-500/20 transition hover:opacity-95">Explorar Produtos</a>
                        <a href="/informacoes" class="inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-950/70 px-5 py-3 text-sm font-semibold text-slate-200 transition hover:border-cyan-400">Ver Notícias</a>
                    </div>
                </div>
                <div class="rounded-[2rem] bg-slate-950/80 p-6 ring-1 ring-slate-800">
                    <div class="space-y-5">
                        <div class="rounded-3xl bg-slate-900/90 p-5 shadow-inner shadow-slate-950/30">
                            <p class="text-sm uppercase tracking-[0.3em] text-cyan-300">Destaque do dia</p>
                            <h2 class="mt-4 text-3xl font-black text-white">Gaming PC Ultimate X</h2>
                            <p class="mt-3 text-slate-400">Com processador Ryzen, GPU RTX e acabamento RGB premium para qualquer setup.</p>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-3xl bg-slate-900/90 p-5">
                                <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Frete</p>
                                <p class="mt-3 text-2xl font-black text-white">Rápido</p>
                            </div>
                            <div class="rounded-3xl bg-slate-900/90 p-5">
                                <p class="text-sm uppercase tracking-[0.3em] text-slate-500">Garantia</p>
                                <p class="mt-3 text-2xl font-black text-white">1 ano</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-12">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between mb-8">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-purple-400">Categorias em destaque</p>
                    <h2 class="mt-3 text-3xl font-black text-white">Confira os melhores equipamentos da semana.</h2>
                </div>
                <a href="/produtos" class="text-cyan-300 hover:text-white text-sm font-semibold transition">Ver tudo →</a>
            </div>
            <div class="grid gap-6 md:grid-cols-3">
                @foreach($produtos as $produto)
                    <article class="rounded-[2rem] border border-slate-800 bg-slate-900/95 p-6 shadow-xl shadow-slate-950/20 transition hover:-translate-y-1">
                        <div class="flex items-center justify-between gap-3 mb-5">
                            <span class="rounded-full bg-slate-800 px-3 py-1 text-xs uppercase tracking-[0.3em] text-slate-400">Produto</span>
                            <span class="text-sm font-semibold text-cyan-300">R$ {{ number_format($produto->price, 2, ',', '.') }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3 truncate">{{ $produto['nome'] }}</h3>
                        <p class="text-slate-400 mb-6 line-clamp-4">{{ Str::limit($produto['description'] ?? 'Um componente de alta qualidade para seu PC gamer.', 120) }}</p>
                        <div class="flex flex-wrap gap-3">
                            <a href="/produtos/{{ $produto['id'] }}" class="rounded-full bg-gradient-to-r from-purple-500 to-cyan-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:opacity-90">Ver detalhes</a>
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
    </main>
</body>
</html>