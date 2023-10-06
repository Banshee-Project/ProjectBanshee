<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoasController extends Controller
{
    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function index (Request $request) {
        $pesquisar = $request->pesquisar;
        $findPessoa = $this->pessoa->getPessoasPesquisarIndex(search: $pesquisar ?? '');  //Lancamento::all();

        return view('pages.pessoas.paginacao', compact('findPessoa'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = Pessoa::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarPessoa(Request $request) {
        
        if ($request->method() == "POST") {
            $data = $request->all();
            // $componentes = new Componentes();
            $data['valor']; //= $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Pessoa::create($data);

            return redirect()->route('pessoas.index');
        } 
        
        return view('pages.pessoas.create');
    }

    public function atualizarPessoa(Request $request, $id) {
        
        if ($request->method() == "PUT") {
            $data = $request->all();
            // $componentes = new Componentes();
            $data['valor']; //= $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaRegistro = Pessoa::find($id); 
            $buscaRegistro->update($data);

            return redirect()->route('pessoas.index');
        } 
        
        $findPessoa = Pessoa::where('id', '=', $id)->first();
        return view('pages.pessoas.atualiza', compact('findPessoa'));
    }
}
