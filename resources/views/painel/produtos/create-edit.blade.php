@extends('painel.produtos.templates.base')

@section('content')

    <div class="container">
        <h1 class="mb-5">{{isset($produto->name) ? "Editar Produto {$produto->name}" : "Cadastrar novo produto"}}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if( isset($produto) )
            {!! Form::model($produto, ['route' => ['produtos.update', $produto->id], 'class' => 'form needs-validation', 'method' => 'put', 'novalidate']) !!}
        @else

            {!! Form::open(['route' => 'produtos.store', 'class' => 'form needs-validation', 'novalidate']) !!}
        @endif

            <div class="form-row">

                <div class="col-md-4 mb-3">
                    {!! Form::label('name', 'Nome do Produto') !!}
                    {!! Form::text('name', null, [ 'class' => 'form-control', 'id' => 'name' , 'placeholder' => 'Nome do Produto', 'required' ]) !!}

                    @if( $errors->get('name') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('name') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    {!! Form::label('numero', 'Número') !!}
                    {!! Form::text('number', null, ['class' => 'form-control', 'id' => 'numero', 'placeholder' => 'Número', 'required']) !!}

                    @if( $errors->get('number') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('number') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="col-md-4 mb-3">
                    <br>
                    <div class="form-check mt-3">
                        {!! Form::checkbox('active', null, null, ['class' => 'form-check-input', 'id' => 'flagativo']) !!}
                        {!! Form::label('flagativo', 'Ativo', ['class' => 'form-check-label']) !!}
                    </div>

                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">

                    {!! Form::label('category', 'Categoria') !!}
                    @if( isset($produto) )
                        {!! Form::select('category', $categorias, null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::select('category', [null=>'Selecione uma Categoria'] + $categorias, null, ['class' => 'form-control']) !!}
                    @endif

                    @if( $errors->get('category') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('category') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="col-md-6 mb-3">
                    {!! Form::label('descricao', 'Descrição') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição do Produto', 'id' => 'descricao', 'rows' => '3', 'cols' => '5' ]) !!}

                    @if( $errors->get('description') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('description') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                </div>

            </div>

            @if( isset($produto) )
                {!! Form::submit('Editar Produto', ['class'=> 'btn btn-primary']) !!}
            @else
                {!! Form::submit('Adicionar Produto', ['class'=> 'btn btn-primary']) !!}
            @endif
        {!! Form::close() !!}

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {

                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                        }, false);

                    });
                }, false);
            })();
        </script>

    </div>

@endsection