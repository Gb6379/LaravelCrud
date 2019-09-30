
@extends('layouts.app')

@section('content')

<div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a companie</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="POST" action="{{ route('companies.update', $companie->id) }}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="name">Nome: </label>
                <input type="text" class="form-control" name="name" value="{{ $companie->name }}" />
            </div>

            <div class="form-group">
                <label for="cnpj">cnpj:</label>
                <input type="text" class="form-control" name="cnpj" value="{{ $companie->cnpj }}" />
            </div>

            <div class="form-group">
                <label for="cnae">cnae:</label>
                <input type="text" class="form-control" name="cnae" value="{{ $companie->cnae }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>




@endsection()