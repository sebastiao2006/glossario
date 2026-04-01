@extends('layouts.admin.app')

@section('title', 'Dashboard Funcionário')

@section('content')
<h1>Meu Perfil</h1>

<p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
<p><strong>Email:</strong> {{ auth()->user()->email }}</p>
<p><strong>Cargo:</strong> {{ auth()->user()->cargo }}</p>
<p><strong>Idade:</strong> {{ auth()->user()->idade }}</p>
<p><strong>ID Funcionário:</strong> {{ auth()->user()->id_funcionario }}</p>
<p><strong>Computador:</strong> {{ auth()->user()->numero_computador }}</p>
<p><strong>Senha Computador:</strong> {{ auth()->user()->senha_computador }}</p>
<p><strong>Fim do Contrato:</strong> {{ auth()->user()->fim_contrato }}</p>
@endsection