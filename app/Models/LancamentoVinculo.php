<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentoVinculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_do_vinculo',
        'lancamento_id',
        'pessoa_id'
    ];

    public function lancamento() {
        return $this->belongsTo(Lancamento::class);
    }

    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }

    public function getLancamentoVinculosPesquisarIndex(string $search = '') {
        $lancamentoVinculo = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('numero_do_vinculo', $search);
                $query->orWhere('numero_do_vinculo', 'LIKE', "%{$search}%");
            }
        })->get();
        
        return $lancamentoVinculo;
    }
}
