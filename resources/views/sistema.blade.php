@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



************ SISTEMA ************<br>

<a href="{{ route('sistema') }}">Início</a>
<a href="{{route('deslogar')}}">Deslogar</a><br>
<a href="{{route('sobre')}}">Sobre o sistema</a><br>
<a href="{{ route('cadastro_produtos') }}">Cadastro de produtos</a><br>
<a href="{{ route('cadastro_vendas') }}">Cadastro de vendas</a><br>
<a href="">Controle de vendas</a><br>
<a href="">Relatório de produtos</a><br>
<a href="">Relatório de vendas</a><br>


<br><br>

<hr>
******* APENAS FICTICIO ******** sistema real sendo construido acima
<hr>
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


<br><br><a href="">Controle de vendas </a> (aqui voce pode editar excluir) <br><br>


<br>session logado?
{{session('logado')}}

<br><br>
Para cadastrar uma venda, é necessário informar:<br>
o cliente /// <br>
os itens da venda. ///<br><br>

forma de pagamento //// <br>
e a possibilidade de gerar parcelas para a venda. //?/ <br><br>

Listagem de vendas realizadas ////é o relatorio<br>
e as funções de editar ou excluir uma venda. ////controle de vendas <br><br>


Funcionalidade adicionais:<br>
1-	login no sistema, e vincular o vendedor pelo login/////<br>
2-	Filtros na listagem de vendas; !!!!!<br>
3-	Baixar o resumo da venda como PDF. /////<br><br>


Requisitos: Laravel, Javascript/Jquery, bootstrap e banco de dados SQL.
Tempo limite para o teste: 24 horas

Boa sorte!
@endsection