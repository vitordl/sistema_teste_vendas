@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



**** CADASTRO VENDAS ****
<br>
<a href="{{ route('sistema') }}">Início</a>
<br>


<form action="{{route('cadastro_vendas_submit') }}" method="get">

    <br>
    Cliente:<input type="text" name="cliente" required><br><br>
    Produto:
    <select name="produtos_select" id="produtos_select" required onblur="capturar_produto()">
        <option selected value="">Selecione</option>
        @foreach($produtos as $prod) 
            <option value="{{$prod->produto}} ({{$prod->valor}})">{{$prod->produto}} ({{$prod->valor}})</option> 

        @endforeach
 
    </select> 
    <br><br>

    <input type="text" placeholder="" id="valorhidden" hidden>
    <input type="text" placeholder="" id="produtos" name="produtos" readonly>
    
    Valor: <input type="text" name="valor" id="valor" readonly required>

    <br><br>

    Quantidade:<input type="number" min="1" name="quantidade" id="quantidade" required onblur="apresenta_total()"><br><br>

    Total:<input type="text" name="total" id="total" readonly required ><br><br>
    

    Forma de pagamento:
    <select name="pagamento" required onclick="apresenta_parcelas()">
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
        valor_total = Math.floor(valor_total*100)/100;
        document.getElementById('total').value = valor_total;
    }


    function capturar_produto(){
        var produto = document.getElementById('produtos_select').value;

       
        var valorhidden = document.getElementById('valorhidden').value = produto;
//stackoverflow regex ainda preciso entender melhor como funciona, 
//mas consegue extrair qualquer dado de uma string
        var regex = /\(([^)]+)\)/;
        var valor_extraido = regex.exec(valorhidden);
        var valor = document.getElementById('valor').value = valor_extraido[1];

        var regex2 = /\[(.*?)\]/;
        var valor_extraido2 = regex2.exec(valorhidden);
        //alert(valor_extraido2[1]);
        
        var valor = document.getElementById('produtos').value = valor_extraido2[1];

        
        //alert(valor_extraido[1]);
      
    }

    

</script>

@endsection