
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lançamentos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('lancamento.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Pesquisar pelo nome..." />
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.lancamento') }}" class="btn btn-success float-end">
                Adicionar lançamento
            </a>
        </form>
    </div>

    <div class="table-responsive mt-4">
        @if ($findLancamento->isEmpty())
            <p>
                Não existe dados para serem mostrados
            </p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findLancamento as $lancamento)
                        <tr>
                            <td>{{$lancamento->id}}</td>
                            <td>{{$lancamento->nome}}</td> 
                            <td>{{'R$' . ' ' . number_format($lancamento->valor, 2, ',', '.') }}</td>
                            <td>
                                <a href="" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <meta name='csrf-token' content=" {{ csrf_token() }}"/>
                                <a onclick="deleteRegistroPaginacao(' {{ route('lancamento.delete') }} ', {{ $lancamento->id }} )" class="btn btn-danger btn-sm">
                                    Excluir
                                </a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection