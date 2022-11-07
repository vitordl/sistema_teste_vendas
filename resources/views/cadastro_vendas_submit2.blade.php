@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}


CADASTRO VENDAS SUBMIT 2 !!!
ALGO COMO "RESUMO DA VENDA botar tudo em maiuscula uppercase"
<a href="{{route('sistema')}}">Inicio</a>

</form>
<form action="{{route('vendas_salvar')}}" method="get">
    <br>
    Cliente:<input type="text" name="cliente" value="{{$cliente}}" readonly required>

    Produto:<input type="text" name="produtos" value="{{$produto}}" readonly required>
    <br><br>
    Valor:<input type="text" name="valor" value="{{$valor}}" readonly required>

    Quantidade<input type="text" name="quantidade" value="{{$quantidade}}" readonly required>

    Total<input type="text" name="total" value="{{$total}}" readonly required><br><br>

    Forma de pagamento: <input type="text" name="pagamento" value="{{$pagamento}}" readonly required><br><br>

    @if($qtdparcelas)
        Qtd parcelas: <input type="text" name="qtdparcelas" value="{{$qtdparcelas}}" readonly required>

        Valor parcelas: <input type="text" name="valorparcela" value="{{$valorparcela}}" readonly required> <br>
    @endif
    <br>
    <input type="submit" value="Finalizar pedido"><br>
    <a href="{{route('sistema')}}">Cancelar</a>
</form>


@endsection