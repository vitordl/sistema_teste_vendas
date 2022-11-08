@extends('layout.layout')

@section('conteudo')

<style>
    table {
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #999;
        padding: 0.5rem;
        text-align: left;
    }

    th{
        background: rgb(201, 248, 180)
    }
  
</style>

RELATORIO DE PRODUTOS!


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