<?php

namespace App\Http\Controllers;

use App\Models\EquipamentModel;
use Illuminate\Http\Request;

class EquipamentModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EquipamentModel::all();
    }

            /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
     */
    public function front_select()
    {
        return EquipamentModel::all(['id as value','description as label']);
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
                'description' => "required",
                'capacity' => "required",
                'type' => "required",
                'subtype' => "",
            ]
        );
        return EquipamentModel::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipamentModel  $equipament_model
     * @return \Illuminate\Http\Response
     */
    public function show(EquipamentModel $equipament_model)
    {
        return $equipament_model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipamentModel  $equipament_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipamentModel $equipament_model)
    {
        $request->validate(
            rules: [
                'description' => "required",
                'capacity' => "required",
                'type' => "required",
                'subtype' => "",
            ]
        );
        $equipament_model->update(
            $request->all()
        );
        return $equipament_model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipamentModel  $equipament_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipamentModel $equipament_model)
    {
        return $equipament_model->delete();
    }
}
