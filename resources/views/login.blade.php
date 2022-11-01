@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}

<form action="{{route('login_submit')}}" method="post">
    @csrf
    Usuário:<input type="text" name="usuario" required>
    Senha:<input type="password" name="senha" required>
    <input type="submit" value="Logar">
</form>
    
<div>
    {{ session('aviso') }}
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection