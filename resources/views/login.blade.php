@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}

<form action="{{route('sistema')}}" method="post">
    @csrf
    Usuário:<input type="text" name="usuario" required>
    Senha:<input type="password" name="senha" required>
    <input type="submit" value="Logar">
</form>
    
@endsection