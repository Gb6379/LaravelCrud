@extends('layouts.app')

@section('content')


<div class="container col-md-4">
<h1 class="mb-3">Cadastro de Empresa</h1>
        <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <div class="form-group">    
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="cnpj">Cnpj</label>
                    <input type="text" class="form-control" name="cnpj"/>
                </div>

                <div class="form-group">
                    <label for="cnae">Cnae</label>
                    <input type="text" class="form-control" name="cnae"/>
                </div>
                        
                <button type="submit" class="btn btn-primary">Add </button>
            </form>
    </div>



@endsection()