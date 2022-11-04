@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



VENDAS CONTROLE

<a href="{{route('sistema')}}">Inicio</a>


<table>
    <thead>
        <th>Produto</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Valor Total</th>
        <th>Tipo Pagamento</th>
        <th>Parcelas</th>
        <th>Valor Parcela</th>
        <th>Cliente</th>
        <th>Vendedor</th>
        <th>Opções</th>
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
            @if ($venda->vendedor == session('usuario'))
                <td><a href="{{route('vendas_remover', $venda->id)}}" >Remover</a></td>
            @endif
            
        </tr>
        @endforeach
    </tbody>
</table>




<br>session logado?
{{session('logado')}}

<script>
    //onclick="deletar_venda()"
    // function deletar_venda(){
    //     if (confirm('Tem certeza que quer remover esse item?')) {

    //     }else{

    //     }
    // }
</script>

@endsection