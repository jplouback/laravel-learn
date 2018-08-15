@extends('site.templates.template1')

@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endpush

@section('title')
    Index do site
@endsection

@section('content')
<div class="container">

    <h1>teste2</h1>
    <h1>Home do site</h1>
    {!! $teste !!}

    @if( $var1 == '1231' )
        <p>é igual</p>
    @else
        <p>Não é igual</p>
    @endif

    {{--
    @for($i = 0; $i < 5; $i++ )
        <p>Valor {{$i}}</p>
    @endfor

    <hr>
    --}}

    @foreach($arrayData as $array)
        <p>index {{$array}}</p>
    @endforeach

    <hr>

    @forelse($arrayData as $array)
        <p>index {{$array}}</p>
    @empty
        Não existe itens
    @endforelse

    <hr>

    @php
        echo 'olá mundo!'
    @endphp

    @include('site.includes.sidebar', compact('var1'))

</div>
@endsection

@push('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
@endpush
