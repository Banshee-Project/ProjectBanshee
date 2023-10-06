<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PessoasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::create(
            [
                'nome'          => 'Pessoa 1',
                'email'         => 'imobi.banshee@banshee.com',
                'endereco'      => 'Av. Retorno do Baldinho molhado',
                'logradouro'    => 'logradouro retumbante',
                'cep'           => '782719472',
                'bairro'        => 'Iparecetacalimbotuba dos Santos'
            ]
        );
        Pessoa::create(
            [
                'nome'          => 'Pessoa 2',
                'email'         => 'imobi.banshee@banshee.com',
                'endereco'      => 'Av. Retorno do Baldinho molhado',
                'logradouro'    => 'logradouro retumbante',
                'cep'           => '782719472',
                'bairro'        => 'Iparecetacalimbotuba dos Santos'
            ]
        );
    }
}
