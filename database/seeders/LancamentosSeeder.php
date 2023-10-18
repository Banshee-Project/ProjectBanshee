<?php

namespace Database\Seeders;

use App\Models\Lancamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LancamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lancamento::create(
            [
                'nome' => 'Pagamento do condominio 1',
                'valor' => '569.81'
            ]
        );

        Lancamento::create(
            [
                'nome' => 'Pagamento do condominio 2',
                'valor' => '607.35'
            ]
        );
    }
}
