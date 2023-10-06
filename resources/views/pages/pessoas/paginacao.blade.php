
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pessoas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('pessoas.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Pesquisar pelo nome..." />
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.pessoas') }}" class="btn btn-success float-end">
                Adicionar Pessoa
            </a>
        </form>
    </div>

    <div class="table-responsive mt-4">
        @if ($findPessoa->isEmpty())
            <p>
                Não existe dados para serem mostrados
            </p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Logradouro</th>
                        <th>CEP</th>
                        <th>Bairro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($findPessoa as $pessoa)
                        <tr>
                            <td>{{$pessoa->id}}</td>
                            <td>{{$pessoa->nome}}</td> 
                            <td>{{$pessoa->email}}</td> 
                            <td>{{$pessoa->endereco}}</td> 
                            <td>{{$pessoa->logradouro}}</td> 
                            <td>{{$pessoa->cep}}</td> 
                            <td>{{$pessoa->bairro}}</td> 
                            <td>
                                <a href="{{ route('atualizar.pessoas', $pessoa->id) }}" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <meta name='csrf-token' content=" {{ csrf_token() }}"/>
                                <a onclick="deleteRegistroPaginacao(' {{ route('pessoas.delete') }} ', {{ $pessoa->id }} )" class="btn btn-danger btn-sm">
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