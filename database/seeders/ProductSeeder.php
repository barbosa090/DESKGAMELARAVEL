<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        Product::create([
            'name' => 'PC Gamer DESK-MONSTER RTX 4060',
            'description' => 'Processador Intel Core i5, 16GB RAM DDR5, SSD 1TB NVMe, Placa de Vídeo RTX 4060 8GB.',
            'price' => 4899.90, // O número vai assim pro banco, sem formatação
            'stock' => 5
        ]);
        Product::create([
            'name' => 'PC Gamer DESK-STREAMER RX 7600',
            'description' => 'Processador AMD Ryzen 5, 16GB RAM, SSD 512GB, Placa de Vídeo Radeon RX 7600 8GB.',
            'price' => 4150.00,
            'stock' => 3
            ]);
    }
}
