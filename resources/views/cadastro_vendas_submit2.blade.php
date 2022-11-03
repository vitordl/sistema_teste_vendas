@extends('layout.layout')

@section('conteudo')

{{-- página de login --}}


CADASTRO VENDAS SUBMIT 2 !!!
<a href="{{route('sistema')}}">Inicio</a>

<p>AQUI O MELHOR SERIA PEGAR JA OS DADOS SALVOS NUMA TABELA_VENDAS_temp</p>

<p>**informando todos os dados **</p>
<p>e um botão finalizar pedido que siginifica salvar na tabela_vendas_ORIGINAL</p>
<p>cancelar significaria voltar no inicio no sistema e não salvando na tabela original</p>
<br>session logado?
{{session('logado')}}

@endsection