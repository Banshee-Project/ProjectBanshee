<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestLancamento;
use Illuminate\Http\Request;
use App\Models\Componentes;
use App\Models\Lancamento;

class LancamentosController extends Controller
{
    public function __construct(Lancamento $lancamento)
    {
        $this->lancamento = $lancamento;
    }

    public function index (Request $request) {
        $pesquisar = $request->pesquisar;
        $findLancamento = $this->lancamento->getLancamentosPesquisarIndex(search: $pesquisar ?? '');  //Lancamento::all();

        return view('pages.lancamentos.paginacao', compact('findLancamento'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = Lancamento::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarLancamento(FormRequestLancamento $request) {
        
        if ($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Lancamento::create($data);

            return redirect()->route('lancamento.index');
        } 
        
        return view('pages.lancamentos.create');
    }
}
