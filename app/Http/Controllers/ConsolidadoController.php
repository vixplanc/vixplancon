<?php

namespace App\Http\Controllers;

use App\Models\Consolidado;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Consolidado::all();
    }

        /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Consolidado::all(['id as value','prefixo as text']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            rules: [
                'modelo'=> 'required',
                'contrato'=> 'required',
                'contrato_centro_custo'=> 'required',
                'equipamento'=> '',
                'status'=> 'required',
                'contratual'=> 'required',
                'prefixo'=> 'required',
                'regime'=> 'required',
                'codigo_sap'=> 'required',
            ]
        );
        return Consolidado::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function show(Consolidado $consolidado)
    {
        return $consolidado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consolidado $consolidado)
    {
        $request->validate(
            rules: [
                'modelo'=> 'required',
                'contrato'=> 'required',
                'contrato_centro_custo'=> 'required',
                'equipamento'=> '',
                'status'=> 'required',
                'contratual'=> 'required',
                'prefixo'=> 'required',
                'regime'=> 'required',
                'codigo_sap'=> 'required',
            ]
        );
        $consolidado->update(
            $request->all()
        );
        return $consolidado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consolidado $consolidado)
    {
        $consolidado->delete();
    }
}
