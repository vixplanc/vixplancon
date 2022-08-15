<?php

namespace App\Http\Controllers;

use App\Models\EquipmentModel;
use Illuminate\Http\Request;

class EquipmentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EquipmentModel::all();
    }

            /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_select()
    {
        return EquipmentModel::all(['id as value','description as label']);
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
                'descricao' => "required",
                'capacidade' => "required",
                'tipo' => "required",
                'subtipo' => "required",
            ]
        );

        $payload = $request->all();
        // dd($payload);
        $data = [
            "description"=>$payload["descricao"],
            "capacity"=>$payload["capacidade"],
            "type"=>$payload["tipo"],
            "subtype"=>$payload["subtipo"],
        ];
        return EquipmentModel::create(
            // $request->all()
            $data
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentModel  $equipment_model
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentModel $equipment_model)
    {
        return $equipment_model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentModel  $equipment_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentModel $equipment_model)
    {
        $request->validate(
            rules: [
                'descricao' => "required",
                'capacidade' => "required",
                'tipo' => "required",
                'subtipo' => "required",
            ]
        );

        $payload = $request->all();
        // dd($payload);
        $data = [
            "description"=>$payload["descricao"],
            "capacity"=>$payload["capacidade"],
            "type"=>$payload["tipo"],
            "subtype"=>$payload["subtipo"],
        ];
        $equipment_model->update(
            // $request->all()
            $data
        );
        return $equipment_model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentModel  $equipment_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentModel $equipment_model)
    {
        return $equipment_model->delete();
    }
}
