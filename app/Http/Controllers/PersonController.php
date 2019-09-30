<?php

namespace App\Http\Controllers;

use App\companie;
use App\person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $person = person::all();
        $companie = companie::all();
        return view('person.listPerson')->with('companie', $companie)->with('person',$person);
    }

  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companie = companie::all();
        return view('person.createPerson')->with('companie', $companie);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'=> 'required',
            'lastname' => 'required',
            'cpf' => 'required',
         ]);

         person::create($request->all());

         return redirect()->route('person.listPerson')->with('success', 'Employee saved');//make a view to list persons

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($person_id)
    {
        //
        $person = person::find($person_id);
        $companie = companie::all();
        return view('person.editPerson')->with('companie', $companie)->with('person',$person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $person_id)
    {
        //
        $this->validate($request, [
            'name'=> 'required',
            'lastname' => 'required',
            'cpf' => 'required',
         ]);

        $person = person::find($person_id);
        
        if($person){
            $person->name = $request->input('name');
            $person->lastname = $request->input('lastname');
            $person->cpf = $request->input('cpf');
            $person->email = $request->input('email');
            $person->companie_id = $request->input('companie_id');
            $person->save();
        }

        return redirect()->route('person.listPerson')->with('success', 'Employee Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($person_id)
    {
        //
        $person = person::find($person_id);
        if($person){
            $person->delete();
        }

        return redirect()->route('person.listPerson')->with('danger', 'Employee Deleted!');
    }
}
