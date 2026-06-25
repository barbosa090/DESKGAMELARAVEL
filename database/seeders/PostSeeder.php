<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support5\Str;

class PostSeeder extends Seeder
{
    
    public function run(): void
    {
        Post::create([
            'title' => 'Nova geração de placas de vídeo RTX é anunciada!',
            'slug' => 'nova-geracao-de-placas-de-video-rtx-e-anunciada',
            'content' => 'A nova arquitetura promete o dobro de performance em Ray Tracing e traz uma nova versão do DLSS baseada em redes neurais ainda mais avançadas. Os modelos chegam ao mercado no próximo semestre custando a partir de US$ 599 dólares.',
        ]);

        Post::create([
            'title' => 'Vale a pena mudar para memórias DDR5 em 2026?',
            'slug' => 'vale-a-pena-mudar-para-memorias-ddr5-em-2026',
            'content' => 'Analisamos o impacto das memórias DDR5 nos jogos mais recentes. Com a queda dos preços e o amadurecimento das plataformas AMD e Intel, a frequência mais alta estabiliza a taxa de quadros por segundo (FPS) e reduz travamentos em jogos de mundo aberto.',
        ]);
    }
}
