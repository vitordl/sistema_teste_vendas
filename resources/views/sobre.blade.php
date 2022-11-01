@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



SOBRE

<a href="{{route('deslogar')}}">deslogar</a>
<a href="{{route('sistema')}}">voltar ao sistema</a>

<br>session logado?
{{session('logado')}}

@endsection