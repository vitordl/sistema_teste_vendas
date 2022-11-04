@extends('layout.layout')

@section('conteudo')



CADASTRO VENDAS SUBMIT

<a href="{{route('sistema')}}">Início</a>


@if($pagamento == 'a vista') 
<form action="{{ route('vendas_salvar') }}" method="get">
@else
<form action="{{ route('cadastro_vendas_submit2') }}" method="get">
@endif

    <br>
    Cliente:<input type="text" name="cliente" value="{{$cliente}}" readonly required><br><br>

    Produto:<input type="text" name="produtos" value="{{$produto}}" readonly required><br><br>

    Valor:<input type="text" name="valor" value="{{$valor}}" readonly required><br><br>

    Quantidade<input type="text" name="quantidade" value="{{$quantidade}}" readonly required><br><br>

    Total<input type="text" id="total" name="total" value="{{$total}}" readonly required><br><br>

    Forma de pagamento: <input type="text" name="pagamento" value="{{$pagamento}}" readonly required><br>

<br><br>
    

@if ($pagamento == 'a prazo')
        QTD PARCELAS:
        <select name="qtdparcelas" id="qtdparcelas" required onclick="valorParcela()">
            <option selected value="">Selecione</option>
            <option value="2">2x sem juros</option>
            <option value="3">3x sem juros</option>
            <option value="5">5x sem juros</option>
            <option value="7">7x sem juros</option>
            <option value="10">10x sem juros</option>
        </select>

        VALOR PARCELA: <input type="text" name="valorparcela" required readonly id="valorparcela"><br><br>

        <input type="submit" value="Continuar"><br><br>
        
        <a href="{{ route('sistema') }}">Cancelar</a>

@else
    
    <input type="submit" value="Finalizar pedido"><br><br>
    {{-- <a href="{{route('sistema')}}">Confirmar</a><br> --}}
    <a href="#">Cancelar</a>
    <br>

</form> 
@endif

<script>
    function valorParcela(){
        var total = document.getElementById('total').value;
        var qtdparcelas = document.getElementById('qtdparcelas').value;
        var valor_por_qtd_parcela = total/qtdparcelas;
        valor_por_qtd_parcela = Math.floor(valor_por_qtd_parcela * 100) / 100
        document.getElementById('valorparcela').value = valor_por_qtd_parcela;
        
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