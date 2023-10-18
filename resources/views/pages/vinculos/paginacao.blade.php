
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vinculos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('lancamentoVinculos.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Pesquisar pelo nome..." />
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.pessoas') }}" class="btn btn-success float-end">
                Adicionar Vínculo
            </a>
        </form>
    </div>

    <div class="table-responsive mt-4">
        @if ($findLancamentoVinculos->isEmpty())
            <p>
                Não existe dados para serem mostrados
            </p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>N. Vinculo</th>
                        <th>Lancamento</th>
                        <th>Pessoa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findLancamentoVinculos as $vinculo)
                        <tr>
                            <td>{{$vinculo->id}}</td>
                            <td>{{$vinculo->numero_do_vinculo}}</td> 
                            <td>{{$vinculo->lancamento->nome}}</td> 
                            <td>{{$vinculo->pessoa->nome}}</td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection