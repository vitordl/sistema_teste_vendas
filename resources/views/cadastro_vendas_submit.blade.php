@extends('layout.layout')

@section('conteudo')



CADASTRO VENDAS SUBMIT

<a href="{{route('sistema')}}">Início</a>

<p>CLIENTE:{{$cliente}} </p>
<p>PRODUTO:{{$produto}} </p>
<p>VALOR:{{$valor}}</p>
<p>QUANTIDADE: {{$quantidade}}</p>
<p>TOTAL: {{$total}}</p>
<p>PAGAMENTO: {{$pagamento}}</p>


@if ($pagamento == 'a prazo')
    <form action="{{route('cadastro_vendas_submit2')}}" method="get">
        QTD PARCELAS:
        <select name="qtdparcelas" id="qtdparcelas" required onclick="valorParcela()">
            <option selected value="">Selecione</option>
            <option value="2">2x sem juros</option>
            <option value="3">3x sem juros</option>
            <option value="5">5x sem juros</option>
            <option value="7">7x sem juros</option>
            <option value="10">10x sem juros</option>
        </select>

        VALOR PARCELA: <input type="text" name="valorparcela" required readonly id="valorparcela">

        <input type="submit" value="Confirmar">
    </form>
    
@else

    <a href="{{route('sistema')}}">Confirmar</a><br>
    <a href="#">Cancelar</a>
    <br>
@endif

<script>
    function valorParcela(){
        var qtdparcelas = document.getElementById('qtdparcelas').value;
        var valor_por_qtd_parcela = 3500/qtdparcelas;
        document.getElementById('valorparcela').value = 'R$'+valor_por_qtd_parcela;
    }   
</script>



<br>session logado?
{{session('logado')}}

<p>daqui em diante:<br>
    após clicar em confirmar ele vai levar para uma página estática com todos
    os dados referentes a essa página e apenas com 2 botões, finalizar pedido e cancelar (tem certeza?)
</p>

<p>perái ja preciso salvar aqui mesmo no banco de dados quando clicar em confirmar.. eu acho</p>

<p>no finalizar pedido ele vai finalmente salvar no banco de dados</p>

<p>e essas informacoes vão para a tabela de relatório de vendas </p>


@endsection