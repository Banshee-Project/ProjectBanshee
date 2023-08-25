<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lancamento;

class LancamentosController extends Controller
{
    public function index () {
        $findLancamento = Lancamento::all();

        return view('pages.lancamentos.paginacao', compact('findLancamento'));
    }
}
