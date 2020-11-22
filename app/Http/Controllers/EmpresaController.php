<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Session;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $empresa = Empresa::all();
        return view('empresa.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $empresa = Empresa::all()->sortBy('nombre');
        return view('empresa.index', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // echo('asdasdas');
        $request->validate([
            'nombre' => 'required',
            'rubro' => 'required',
            'nit' => 'required',
            'año_gestion' => 'required',
            'ingreso_enero' => 'required',
            'ingreso_febrero' => 'required',
            'ingreso_marzo' => 'required',
            'ingreso_abril' => 'required',
            'ingreso_mayo' => 'required',
            'ingreso_junio' => 'required',
            'ingreso_julio' => 'required',
            'ingreso_agosto' => 'required',
            'ingreso_septiembre' => 'required',
            'ingreso_octubre' => 'required',
            'ingreso_noviembre' => 'required',
            'ingreso_diciembre' => 'required',
        ]);
            
        // dd($request);
        Empresa::create([
                    'nombre' => $request->nombre,
                    'rubro' => $request->rubro,
                    'nit' => $request->nit,
                    'direccion' => $request->direccion,
                    'año_gestion' => $request->año_gestion,
                    'ingreso_enero' => $request->ingreso_enero,
                    'ingreso_febrero' => $request->ingreso_febrero,
                    'ingreso_marzo' => $request->ingreso_marzo,
                    'ingreso_abril' => $request->ingreso_abril,
                    'ingreso_mayo' => $request->ingreso_mayo,
                    'ingreso_junio' => $request->ingreso_junio,
                    'ingreso_julio' => $request->ingreso_julio,
                    'ingreso_agosto' => $request->ingreso_agosto,
                    'ingreso_septiembre' => $request->ingreso_septiembre,
                    'ingreso_octubre' => $request->ingreso_octubre,
                    'ingreso_noviembre' => $request->ingreso_noviembre,
                    'ingreso_diciembre' => $request->ingreso_diciembre,

                ]);

         Session::flash('message','Empresa creado exisitosamente!');
            return redirect()->route('empresa.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
