@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}



************ SISTEMA ************<br>

<a href="{{ route('sistema') }}">Início</a>
<a href="{{route('deslogar')}}">Deslogar</a><br>
<a href="{{route('sobre')}}">Sobre o sistema</a><br>
<a href="{{ route('cadastro_produtos') }}">Cadastro de produtos</a><br>
<a href="{{ route('cadastro_vendas') }}">Cadastro de vendas</a><br>
<a href="{{route('vendas_controle')}}">Controle de vendas</a><br>
<a href="{{route('relatorio_produtos')}}">Relatório de produtos</a><br>
<a href="{{route('relatorio_vendas')}}">Relatório de vendas</a><br>


<br><br>

<hr>
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

@endsection