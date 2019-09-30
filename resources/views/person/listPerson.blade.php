@extends('layouts.app')

@section('content')



<div class="container">

    
    <h1>Lista de Funcionarios</h1>
    <a class="btn btn-success" href="{{route('person.createPerson')}}" > Create</a>

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
            <th>Sobrenome</th>           
            <th>Cpf</th>
            <th>Email</th>   
            <th>companie</th>        
        </thead>
        <tbody>
        @foreach($person as $person)
            <tr>
                
                <td>{{$person->name}}</td>
                <td> {{$person->lastname}}</td>
                <td>{{$person->cpf}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->companie->name}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('person.editPerson', $person->id)}}" >Edit</a>
                </td>
                <td>
                    <form action="{{route('person.destroy', $person->id)}}" method="POST">  

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