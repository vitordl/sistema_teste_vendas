@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



SISTEMA

<a href="{{route('deslogar')}}">deslogar</a>
<a href="{{route('sobre')}}">Sobre o sistema</a>


<br>session logado?
{{session('logado')}}
@endsection