@extends('painel.produtos.templates.base')

@push('css')
    
@endpush

@section('content')

    <div class="container">


        <div class="row mt-5 mb-3">
            <div class="col-6">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('produtos.create')}}" title="Adicionar" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Adicionar</a>
            </div>
        </div>
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Número</th>
                <th>Descrição</th>
                <th width="20%" class="text-center">Ações</th>
            </tr>

            @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->name}}</td>
                    <td>{{$produto->number}}</td>
                    <td>{{$produto->description}}</td>
                    <td class="text-center">
                        <a href="#" title="Editar" class="btn btn-sm btn-danger"><i class="fas fa-edit"></i> Editar</a>
                        <a href="#" title="Deletar" class="btn btn-sm btn-info"><i class="fas fa-trash-alt"></i> Deletar</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection