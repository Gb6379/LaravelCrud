<?php

namespace App\Http\Controllers;

use App\companie;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companie = companie::all();
        return view('companies.list')->with('companie', $companie);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
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
       $this->validate($request,[

            "name" => "required|string|max:255",
            "cnpj" => "required|string|max:14",
            "cnae" => "required|string",

       ]);

            $companie = new companie();
            $companie->name = $request->input('name');
            $companie->cnpj = $request->input('cnpj');
            $companie->cnae = $request->input('cnae');
            $companie->save();
       
         

            return redirect()->route('companies.list')->with('success', 'Companie Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function show(companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function edit($companie_id)
    {
        $companie = companie::find($companie_id);
        //dd($companie);
        return view('companies.edit')->with('companie', $companie);
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $companie_id)
    {
        //
        $this->validate($request, [//validate fields

            "name" => "required|string|max:255",
            "cnpj" => "required|string|max:14",
            "cnae" => "required|string",

        ]);

        $companie = companie::find($companie_id);

        if($companie){
            $companie->name = $request->input('name');
            $companie->cnpj = $request->input('cnpj');
            $companie->cnae = $request->input('cnae');
            $companie->save();    //persists on db
        }

        //return redirect('/companies')->with('success', 'Contact updated!');
        return redirect()->route('companies.list')->with('success', 'Companie Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function destroy($companie_id)
    {
        //
        $companie = companie::find($companie_id);

        if($companie){
            $companie->delete();
        }

        return redirect()->route('companies.list')->with('danger', 'Companie Deleted!');
    }
}
