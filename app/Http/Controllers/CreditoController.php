<?php

namespace App\Http\Controllers;

use App\Credito;
use App\Empresa;
use Session;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $credito = Credito::all();
        $empresa = Empresa::all()->sortBy('nombre');
        return view('credito.index', compact('empresa','credito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empresas_id'=> 'required',
        ]);
            
        // dd($request);
        Credito::create([
                    'monto_solicitado' => $request->monto_solicitado,
                    'interes' => $request->interes,
                    'monto_valuacion' => $request->monto_valuacion,
                    'promedio' => $request->promedio,
                    'descripcion_valucion' => $request->descripcion_valucion,
                    'empresas_id' => $request->empresas_id,
                ]);

         Session::flash('message','Credito creada exisitosamente!');
            return redirect()->route('credito.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }
}
