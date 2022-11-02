@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



**** CADASTRO VENDAS *****    --session logado?{{session('logado')}}
<br>
<a href="{{ route('sistema') }}">Início</a>
<br>

<form action="{{ route('cadastro_vendas_submit') }}" method="get">
    <br>
    Cliente:<input type="text" name="cliente" required><br><br>
    Produto:
    <select name="produtos" id="" required>
        <option selected value="">Selecione</option>
        <option value="TV">TV</option>
        <option value="Notebook">Notebook</option>
        <option value="Celular">Celular</option>
    </select> (vai puxar do bd os produtos)
    <br><br>
    Valor: <input type="text" name="valor" value="1200" id="valor" readonly required>
(vai puxar automaticamente com php ou js?)
    <br><br>

    Quantidade:<input type="number" name="quantidade" id="quantidade" required onblur="apresenta_total()"><br><br>

    Total:<input type="text" name="total" id="total" readonly required ><br><br>
    


    Forma de pagamento:
    <select name="pagamento"  required>
        <option selected value="">Selecione</option>
        <option value="a vista">A vista</option>
        <option value="a prazo">A prazo</option>
    </select>

<br><br>
    <input type="submit" value="Continuar"><br><br>
    <a href="{{ route('sistema') }}">Cancelar</a>
</form>


<script>
    function apresenta_total(){
        var quantidade = document.getElementById('quantidade').value;
        var valor = document.getElementById('valor').value;
       
        var valor_total = quantidade * valor; 
        document.getElementById('total').value = valor_total;
    }

    // function apresenta_parcelas(){
    //     //id="pagamento" onblur="apresenta_parcelas()"
    //     var pagamento = document.getElementById('pagamento').value;
    //     if(pagamento == 'a prazo'){
    //         alert(pagamento);
    //     }
    // }
    

</script>

@endsection