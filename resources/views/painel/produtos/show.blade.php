@extends('painel.produtos.templates.base')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <h1>{{$title}}</h1>
            </div>
        </div>

        @if( isset($errors) )
            <div class="alert alert-danger" role="alert">
                @foreach( $errors->all() as $error )
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <p><strong>Ativo:</strong> {{ $produto->active == 1 ? 'Sim' : 'Não'}}</p>
                <p><strong>Número:</strong> {{ $produto->number }}</p>
                <p><strong>Categoria:</strong> {{ $produto->category }}</p>
                <p><strong>Descrição:</strong> {{ $produto->description }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-right">
                {!! Form::open(['route' => ['produtos.destroy', $produto->id], 'method' => 'delete' ]) !!}
                    {!! Form::submit("Deletar Produto {$produto->name}", ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@endsection