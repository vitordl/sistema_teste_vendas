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
    <a href="">Cancelar</a>
</form>


<hr>

<p>{{$cliente}}</p>
<p>{{$produto}}</p>
<p>{{$valor}}</p>
<p>{{$quantidade}}</p>
<p>{{$total}}</p>
<p>{{$pagamento}}</p>

@if($qtdparcelas)
<p>qtd parcelas::::{{$qtdparcelas}}</p>
@endif

<p>uma visualização maneira com finalizar pedido e cancelar</p>
<p>entao aqui um botao finalizar pedido que vai salvar no banco de dados</p>

<br>session logado?
{{session('logado')}}

@endsection