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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Número</th>
                <th>Descrição</th>
                <th width="28%" class="text-center">Ações</th>
            </tr>

            @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->name}}</td>
                    <td>{{$produto->number}}</td>
                    <td>{{$produto->description}}</td>
                    <td class="text-center">

                        <a href="{{route('produtos.show', $produto->id)}}" title="Editar" class="btn btn-sm btn-secondary"><i class="far fa-eye"></i> Visualizar</a>

                        <a href="{{route('produtos.edit', $produto->id)}}" title="Editar" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Editar</a>

                        {!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'delete', 'class' => 'd-inline-block' ]) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> Deletar', ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach

        </table>

        <nav aria-label="navigation">
            {{ $produtos->links('vendor.pagination.bootstrap-4') }}
        </nav>

    </div>

@endsection