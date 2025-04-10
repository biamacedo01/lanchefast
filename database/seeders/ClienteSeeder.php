<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=> 'Cliente 1',
            'endereco'=>'Rua exemplo, 123',
            'telefone'=>'1199999999',
            'cpf'=>'12345678901',
            'email'=>'cliente@example.com',
            'senha'=>bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome'=> 'Cliente 2',
            'endereco'=>'Rua exemplo, 123',
            'telefone'=>'1199999999',
            'cpf'=>'12345678910',
            'email'=>'cliente2@example.com',
            'senha'=>bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome'=> 'Cliente 3',
            'endereco'=>'Rua exemplo, 123',
            'telefone'=>'1199999923',
            'cpf'=>'12345678927',
            'email'=>'cliente3@example.com',
            'senha'=>bcrypt('senha123'),
        ]);

    }

    
}
