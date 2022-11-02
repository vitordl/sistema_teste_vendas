@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



************ SISTEMA ************<br>

<a href="{{route('deslogar')}}">Deslogar</a><br>
<a href="{{route('sobre')}}">Sobre o sistema</a><br>

<br><br>
Cadastro<br>
<a href="">Cadastro de produtos</a><br>
tabela<br>
id | produto | valor |<br><br>

campos de cadastro produto<br>
id:___ --input readonly <[talvez nao precisa do id]><br>
produto:___________ --input text<br> 
valor:____ --input text <br>
[salvar button], [cancelar button]
<br><br>
<hr>

<a href="">Cadastro de vendas</a><br>
id | produto | valor | qtd | valor total | tipo de pagto | cliente | vendedor | <br>

<br>
campos de cadastro de venda<br>
**dados produto**<br>
cliente:__________ --input text<br> 
produto:_________\/ --select<br> 
valor:____ --input readonly <br>
quantidade:___ --input text only numbers<br>

[continuar button]
<br><br>


**dados pagamento**<br>
total:_____ --input readonly<br>
forma de pagamento: ____ --select a vista, a prazo<br>

[javascript if a prazo]<br>
parcelas:____ --select 2x, 3x, 5x, 7x, 10x<br>

[button finalizar pedido], [button cancelar] tem certeza js?
<br>
<br>
Relatorio<br>
<a href="">Relatorio de produtos</a><br>
<a href="">Relatorio de vendas</a><br><br>


<br>session logado?
{{session('logado')}}
@endsection