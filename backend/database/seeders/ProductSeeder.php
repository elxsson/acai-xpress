<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Acre',
                'size' => 500, // Tamanho em mililitros
                'toppings' => json_encode(['morango', 'banana', 'aveia', 'ninho']),
                'description' => 'Açaí com acompanhamentos típicos do Acre, com sabores regionais e frescos.',
                'price' => 12.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amazonas',
                'size' => 700,
                'toppings' => json_encode(['kiwi', 'leite condensado', 'kitkat']),
                'description' => 'Açaí com sabores exóticos do Amazonas, combinando frutas frescas da região.',
                'price' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bahia',
                'size' => 700,
                'toppings' => json_encode(['morango', 'm&m\'s', 'banana']),
                'description' => 'Açaí com o sabor intenso da Bahia, com frutas tropicais e um toque doce.',
                'price' => 18.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ceará',
                'size' => 500,
                'toppings' => json_encode(['morango', 'kiwi', 'ninho']),
                'description' => 'Açaí com frutas frescas e opções deliciosas típicas do Ceará.',
                'price' => 14.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Goiás',
                'size' => 700,
                'toppings' => json_encode(['banana', 'kitkat', 'aveia']),
                'description' => 'Açaí com o sabor do Centro-Oeste, combinando frutas e chocolates.',
                'price' => 16.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maranhão',
                'size' => 500,
                'toppings' => json_encode(['morango', 'm&m\'s', 'leite condensado']),
                'description' => 'Açaí com a autenticidade do Maranhão, misturando frutas e doces regionais.',
                'price' => 11.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Minas Gerais',
                'size' => 500,
                'toppings' => json_encode(['banana', 'aveia', 'kiwi']),
                'description' => 'Açaí com frutas e doces típicos de Minas Gerais, para um sabor único.',
                'price' => 13.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rio de Janeiro',
                'size' => 700,
                'toppings' => json_encode(['leite condensado', 'banana', 'kitkat']),
                'description' => 'Açaí com os melhores acompanhamentos do Rio de Janeiro, misturando sabor e qualidade.',
                'price' => 17.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rio Grande do Norte',
                'size' => 700,
                'toppings' => json_encode(['m&m\'s', 'morango', 'ninho']),
                'description' => 'Açaí com a deliciosa mistura de sabores do Rio Grande do Norte, com frutas tropicais e doces.',
                'price' => 16.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paraná',
                'size' => 500,
                'toppings' => json_encode(['kiwi', 'chocolate granulado', 'morango']),
                'description' => 'Açaí com o sabor vibrante do Paraná, com frutas frescas e toques tropicais.',
                'price' => 14.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Santa Catarina',
                'size' => 700,
                'toppings' => json_encode(['banana', 'leite condensado', 'aveia']),
                'description' => 'Açaí com o frescor de Santa Catarina, combinando frutas e delicadezas regionais.',
                'price' => 17.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'São Paulo',
                'size' => 700,
                'toppings' => json_encode(['m&m\'s', 'chocolate branco', 'banana']),
                'description' => 'Açaí com uma mistura de frutas e acompanhamentos clássicos de São Paulo.',
                'price' => 19.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Espírito Santo',
                'size' => 500,
                'toppings' => json_encode(['kiwi', 'chocolate preto', 'morango']),
                'description' => 'Açaí com sabores do Espírito Santo, misturando frutas e doces regionais.',
                'price' => 15.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pernambuco',
                'size' => 700,
                'toppings' => json_encode(['ninho', 'banana', 'leite condensado']),
                'description' => 'Açaí com uma combinação de frutas tropicais e sabores típicos de Pernambuco.',
                'price' => 16.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rondônia',
                'size' => 600,
                'toppings' => json_encode(['morango', 'chocolate branco', 'aveia']),
                'description' => 'Açaí com o sabor especial de Rondônia, misturando frutas da região.',
                'price' => 13.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tocantins',
                'size' => 650,
                'toppings' => json_encode(['banana', 'kiwi', 'm&m\'s']),
                'description' => 'Açaí do Tocantins com um toque único de frutas frescas e ingredientes regionais.',
                'price' => 14.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paraíba',
                'size' => 700,
                'toppings' => json_encode(['morango', 'leite condensado', 'granola']),
                'description' => 'Açaí com frutas tropicais e um toque do sabor característico da Paraíba.',
                'price' => 16.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alagoas',
                'size' => 600,
                'toppings' => json_encode(['chocolate granulado', 'kiwi', 'morango']),
                'description' => 'Açaí com o frescor das frutas de Alagoas, um toque tropical e saboroso.',
                'price' => 15.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mato Grosso',
                'size' => 700,
                'toppings' => json_encode(['banana', 'aveia', 'kitkat']),
                'description' => 'Açaí com sabores do Mato Grosso, utilizando frutas da região e acompanhamentos especiais.',
                'price' => 17.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sergipe',
                'size' => 600,
                'toppings' => json_encode(['ninho', 'leite condensado', 'm&m\'s']),
                'description' => 'Açaí com o sabor de Sergipe, com frutas frescas e ingredientes exclusivos da região.',
                'price' => 14.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}