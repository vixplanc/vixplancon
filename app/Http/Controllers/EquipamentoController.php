<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipamento::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        return Equipamento::all()->load('modelo');
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_select()
    {
        return Equipamento::all(['id as value','denominacao as text']);
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
                'modelo_id' => "required",
                'denominacao' => "required",
                'placa' => "required",
                'chassi' => "required",
            ]
        );
        return Equipamento::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        return $equipamento;
    }

    /**
     * Display the specified resource with all relationships.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show_full(Equipamento $equipamento)
    {
        return $equipamento->load('modelo');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate(
            rules: [
                'modelo_id' => "required",
                'denominacao' => "required",
                'placa' => "required",
                'chassi' => "required",
            ]
        );
        $equipamento->update(
            $request->all()
        );
        return $equipamento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $equipamento)
    {
        return $equipamento->delete();
    }
}
