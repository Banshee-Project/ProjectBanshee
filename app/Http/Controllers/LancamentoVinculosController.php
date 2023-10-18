<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestLancamentoVinculo;
use App\Models\LancamentoVinculo;
use Illuminate\Http\Request;

class LancamentoVinculosController extends Controller
{
    public function __construct(LancamentoVinculo $lancamentoVinculo)
    {
        $this->lancamentoVinculo = $lancamentoVinculo;
    }

    public function index (Request $request) {
        $pesquisar = $request->pesquisar;
        $lancamentoVinculos = $this->lancamentoVinculos->getLancamentoVinculosPesquisarIndex(search: $pesquisar ?? '');  //Lancamento::all();

        return view('pages.lancamentoVinculos.paginacao', compact('findLancamentoVinculos'));
    }

    public function cadastrarLancamentoVinculo(FormRequestLancamentoVinculo $request) {
            
        if ($request->method() == "POST") {
            $data = $request->all();
            // $componentes = new Componentes();
            $data['valor']; 
            LancamentoVinculo::create($data);

            return redirect()->route('lancamentoVinculos.index');
        } 
        
        return view('pages.lancamentoVinculos.create');
    }
}
