@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



RELATORIO DE PRODUTOS!

<a href="{{route('sistema')}}">Inicio</a>


<table>
    <thead>
        <th>Produto</th>
        <th>Valor</th>
        <th>Vendedor</th>
    </thead>

    <tbody>
        @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->produto}}</td>
            <td>{{$produto->valor}}</td>
            <td>{{$produto->vendedor}}</td>
                 
        </tr>
        @endforeach
    </tbody>
    
</table>


@endsection