@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



RELATORIO DE VENDAS!

<a href="{{route('sistema')}}">Inicio</a>


<table>
    <thead>
        <th>Produto</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th style="color:red">Valor Total</th>
        <th>Tipo Pagamento</th>
        <th>Parcelas</th>
        <th>Valor Parcela</th>
        <th>Cliente</th>
        <th>Vendedor</th>
    </thead>

    <tbody>
        @foreach($vendas as $venda)
        <tr>
            <td>{{$venda->produto}}</td>
            <td>{{$venda->valor}}</td>
            <td>{{$venda->quantidade}}</td>
            <td>{{$venda->valor_total}}</td>
            <td>{{$venda->tipo_pgto}}</td>
            <td>{{$venda->parcelas}}</td>
            <td>{{$venda->valor_parcela}}</td>
            <td>{{$venda->cliente}}</td>
            <td>{{$venda->vendedor}}</td>
                 
        </tr>
        @endforeach
    </tbody>
    
</table>

<p id="total_tabela" style="color:brown">TOTAL DE VENDAS = {{$total_valor}} </p>

<hr>

<a href="{{route('pdf')}}">Gerar PDF</a>




@endsection