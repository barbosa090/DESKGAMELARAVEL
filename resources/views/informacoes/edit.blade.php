@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-lg border border-slate-800 bg-slate-900/95 p-8 shadow-xl">
        <h1 class="text-3xl font-black text-white mb-8">Editar Notícia</h1>

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-500/20 bg-red-500/10 p-4 text-red-200">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-300 mb-2">Título</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $post->title) }}"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                    required
                >
            </div>

            <div>
                <label for="content" class="block text-sm font-semibold text-slate-300 mb-2">Conteúdo</label>
                <textarea 
                    id="content" 
                    name="content"
                    rows="8"
                    class="w-full rounded-lg border border-slate-700 bg-slate-800 px-4 py-2 text-white placeholder-slate-500 focus:border-purple-500 focus:outline-none"
                    required
                >{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="flex gap-4">
                <button 
                    type="submit"
                    class="flex-1 rounded-lg bg-gradient-to-r from-purple-500 to-cyan-400 px-6 py-3 font-semibold text-slate-950 transition hover:opacity-90"
                >
                    Atualizar Notícia
                </button>
                <a 
                    href="{{ route('posts.index') }}"
                    class="flex-1 rounded-lg border border-slate-700 bg-slate-800 px-6 py-3 text-center font-semibold text-slate-300 transition hover:border-slate-600"
                >
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
