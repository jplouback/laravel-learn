@extends('painel.produtos.templates.base')

@section('content')

    <div class="container">
        <h1 class="mb-5">Cadastro de Produto</h1>
        <form class="needs-validation" novalidate method="post" action="{{route('produtos.store')}}">
            {{--<input type="hidden" name="id" value="">--}}

            {!! csrf_field() !!}


            <div class="form-row">

                <div class="col-md-4 mb-3">
                    <label for="name">Nome do Produto</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome do Produto" value="" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="numero">Número</label>
                    <input type="text" name="number" class="form-control" id="numero" placeholder="Número" value="" required>
                </div>

                <div class="col-md-4 mb-3">
                    <br>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="active" value="1" id="flagativo">
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
                            <option value="{{$categoria}}">{{$categoria}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="descricao">Descrição</label>
                    <textarea name="description" class="form-control" id="descricao" rows="3"></textarea>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Adicionar</button>
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