@extends('layouts.app')

@section('content')



<div class="container">

    
    <h1>Lista de empresas</h1>
    <a class="btn btn-success" href="{{ route('companies.create')}}" > Create</a>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

        <p>{{ $message }}</p>

        </div>
    @elseif ($message = Session::get('danger'))
        <div class="alert alert-danger">

        <p>{{ $message }}</p>

        </div>
    @endif

    <table class="table table-bordered table-dark"> 
        <thead>
            <th>Nome</th>
            <th>Cnpj</th>
            <th>Cnae</th>           
        </thead>
        <tbody>
        @foreach($companie as $companie)
            <tr>
                
                <td>{{$companie->name}}</td>
                <td> {{$companie->cnpj}}</td>
                <td>{{$companie->cnae}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('companies.edit', $companie->id)}}" >Edit</a>
                </td>
                <td>
                    <form action="{{ route('companies.destroy', $companie->id)}}" method="POST">  

                            @csrf
                            @method('DELETE')

                    

                            <button type="submit" class="btn btn-danger">Delete</button>
                    </form>                   
                </td>              
            </tr>
          
           
        </tbody>

        @endforeach 
    </table>

  
</div>


@endsection()