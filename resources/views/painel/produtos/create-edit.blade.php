@extends('painel.produtos.templates.base')

@section('content')

    <div class="container">
        <h1 class="mb-5">Cadastro de Produto</h1>

        {{--@if( isset($errors) && count($errors) > 0 )--}}

            {{--@foreach( $errors->all() as $error )--}}
                {{--<div class="alert alert-danger" role="alert">--}}
                    {{--{{$error}}--}}
                {{--</div>--}}
            {{--@endforeach--}}

        {{--@endif--}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if( isset($produto) )
            <form class="needs-validation" novalidate method="post" action="{{ route('produtos.update', $produto->id) }}">
                {!! method_field('PUT') !!}
        @else
            <form class="needs-validation" novalidate method="post" action="{{ route('produtos.store')}}">
        @endif
            {{--<input type="hidden" name="id" value="">--}}

            {!! csrf_field() !!}


            <div class="form-row">

                <div class="col-md-4 mb-3">
                    <label for="name">Nome do Produto</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do Produto" value="{{ $produto->name or old('name')}}" required>

                    @if( $errors->get('name') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('name') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="numero">Número</label>
                    <input type="text" name="number" class="form-control" id="numero" placeholder="Número" value="{{ $produto->number or old('number')}}" required>

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
                        <input class="form-check-input" type="checkbox" name="active" value="1" id="flagativo" {{ (isset($produto->active) ? $produto->active : old('active') ) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="flagativo">
                            Ativo
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="category">Categoria</label>

                    {{--<input type="text" name="category" class="form-control" id="category" placeholder="Categoria">--}}
                    <select class="custom-select" id="flagativo" name="category">
                        <option value="">Selecione uma categoria</option>

                        @foreach($categorias as $categoria)
                            <option value="{{$categoria}}" {{ (isset($produto->category) ? $produto->category : old('category') ) == $categoria ? 'selected' : '' }} >
                                {{$categoria}}
                            </option>
                        @endforeach

                    </select>

                    @if( $errors->get('category') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('category') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="col-md-6 mb-3">
                    <label for="descricao">Descrição</label>
                    <textarea name="description" class="form-control" id="descricao" rows="3">{{ $produto->description or old('description')}}</textarea>

                    @if( $errors->get('description') )
                        <div class="alert alert-danger" role="alert">
                            @foreach( $errors->get('description') as $error )
                                {{$error}}
                            @endforeach
                        </div>
                    @endif

                </div>

            </div>
            <button class="btn btn-primary" type="submit"> {{isset($produto) ? 'Editar Produto' : 'Adicionar Produto'}} </button>
        </form>

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