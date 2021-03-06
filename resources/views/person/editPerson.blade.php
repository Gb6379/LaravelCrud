@extends('layouts.app')

@section('content')

<!-- this is a form for creating and update -->

<div class="container col-md-4">
        <h1>Cadastro de Pessoas</h1>
        <form action="{{route('person.update', $person->id)}}" method="POST"><!--store-->
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome:</label>
                <a class="float-right" data-toggle="tooltip" data-placement="right" title="Informe o nome"><i class="fa fa-question fa-1x"></i></a>
                <input type="text" class="form-control" required value="{{$person->name}}" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="nome">Sobrenome:</label>
                <a class="float-right" data-toggle="tooltip" data-placement="right" title="Informe o sobrenome"><i class="fa fa-question fa-1x"></i></a>
                <input type="text" class="form-control" required value="{{$person->lastname}}" name="lastname" id="lastname">
            </div>


                <div class="form-group">
                    <label for="nome">CPF:</label>
                    <a class="float-right" data-toggle="tooltip" data-placement="right" title="Informe o cpf"><i class="fa fa-question fa-1x"></i></a>
                    <input type="text" class="form-control" required value="{{$person->cpf}}" name="cpf" id="cpf">
                </div>

                <div class="form-group">
                    <label for="email">email:</label>
                    <a class="float-right" data-toggle="tooltip" data-placement="right" title="Informe o email"><i class="fa fa-question fa-1x"></i></a>          
                    <input type="text" class="form-control" required value="{{$person->email}}" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="companie">Empresa:</label>
                        <select  name="companie_id" id="companie_id" class="form-control select2" style="width: 100%;">
                                @foreach($companie as $companie)
                                    <option @if($companie->id == $person->companie_id ) selected @endif value="{{ $companie->id }}">
                                        {{ $companie->name }}
                                    </option>
                                @endforeach
                            </select>
                </div>

          
                <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-outline-info">Voltar</a>
                <button type="submit" class="btn  btn-outline-success float-right">Salvar</button>
        </form>
    </div>

@endsection()