<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EquipmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('index-equipment')) {
        //     abort(403);
        // }
        return Equipment::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        // if (! Gate::allows('index-equipment')) {
        //     abort(403);
        // }
        return Equipment::all()->load('EquipmentModel');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        // if (! Gate::allows('show-equipment', $equipment)) {
        //     abort(403);
        // }
        return [
            'id' => $equipment->id,
            'modelo_id' => $equipment->equipment_models_id,
            'denominacao' => $equipment->name,
            'placa' => $equipment->plate,
            'chassi' => $equipment->chassi_number,
        ];
    }


    /**
     * Display the specified resource with all relationships.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show_full(Equipment $equipment)
    {
        // if (! Gate::allows('show-equipment', $equipment)) {
        //     abort(403);
        // }
        return $equipment->load('EquipmentModel');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('create-equipment')) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'modelo_id' => "required",
                'denominacao' => "required",
                'placa' => "required",
                'chassi' => "required",
            ]
        );
        $payload = $request->all();
        // dd($payload);
        return Equipment::create(
            [
                'equipment_models_id' => $payload['modelo_id'],
                'name' => $payload['denominacao'],
                'plate' => $payload['placa'],
                'chassi_number' => $payload['chassi'],
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        // if (! Gate::allows('update-equipment', $equipment)) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'modelo_id' => "required",
                'denominacao' => "required",
                'placa' => "required",
                'chassi' => "required",
            ]
        );
        $payload = $request->all();
        $equipment->update(
            [
                'equipment_models_id' => $payload['modelo_id'],
                'name' => $payload['denominacao'],
                'plate' => $payload['placa'],
                'chassi_number' => $payload['chassi'],
            ]
        );
        return $equipment;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        // if (! Gate::allows('delete-equipment', $equipment)) {
        //     abort(403);
        // }
        return $equipment->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_select()
    {
        // if (! Gate::allows('index-equipment')) {
        //     abort(403);
        // }
        return Equipment::all(['id as value','name as label']);
    }
}
