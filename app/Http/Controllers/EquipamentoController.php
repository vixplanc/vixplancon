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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            rules: [
                'placa_cavalo' => "required",
                'prefixo_cavalo' => "required",
                'placa_semi_reboque' => "required",
                'tipo_conjunto' => "required",
                'contrato' => "required",
                'regime' => "required",
                'cod_sap' => "required",
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
                'placa_cavalo' => "required",
                'prefixo_cavalo' => "required",
                'placa_semi_reboque' => "required",
                'tipo_conjunto' => "required",
                'contrato' => "required",
                'regime' => "required",
                'cod_sap' => "required",
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
