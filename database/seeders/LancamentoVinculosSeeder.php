<?php

namespace Database\Seeders;

use App\Models\LancamentoVinculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LancamentoVinculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LancamentoVinculo::create(
            [
                'numero_do_vinculo'         => '1',
                'lancamento_id'             => '1',
                'pessoa_id'                 => '1'
            ]
        );

        LancamentoVinculo::create(
            [
                'numero_do_vinculo'         => '2',
                'lancamento_id'             => '2',
                'pessoa_id'                 => '2'
            ]
        );

    }
}
