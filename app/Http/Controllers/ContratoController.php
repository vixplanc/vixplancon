<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contrato::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        return Contrato::all()->load('perfil');
    }

    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Contrato::all(['id as value','descricao as text']);
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
                'perfil_id' => "required",
                'descricao' => "required",
                'centro_custo' => "required",
                'data_inicio' => "required",
                'data_fim' => "required",
            ]
        );
        return Contrato::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        return $contrato;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show_full(Contrato $contrato)
    {
        return $contrato->load('perfil');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate(
            rules: [
                'perfil_id' => "required",
                'descricao' => "required",
                'centro_custo' => "required",
                'data_inicio' => "required",
                'data_fim' => "required",
            ]
        );
        $contrato->update(
            $request->all()
        );
        return $contrato;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        return $contrato->delete();
    }
}
