@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



**** CADASTRO PRODUTOS *****    --session logado?{{session('logado')}}
<br>
<a href="{{ route('sistema') }}">Início</a>
<br>

<form action="{{ route('cadastro_produtos_submit') }}" method="get">
    <br>
    Produto: <input type="text" name="produto" required><br><br>
    
    Valor: <input type="text" name="valor" required> (botar mask de valor)

    <br><br>
    <input type="submit" value="Salvar"><br>
    <a href="{{ route('sistema') }}">Cancelar</a>
</form>

@endsection