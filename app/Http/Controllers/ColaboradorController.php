<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Colaborador::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        return Colaborador::all()->load(['funcao', 'contrato', 'centro_custo', 'usuario']);
    }

    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Colaborador::all(['id as value','nome as label']);
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
                'funcao'=> "required",
                'contrato'=> "required",
                'contrato_centro_custo'=> "required",
                'user'=> "",
                'nome' => "required",
            ]
        );
        return Colaborador::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show(Colaborador $colaborador)
    {
        return $colaborador;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show_full(Colaborador $colaborador)
    {
        return $colaborador->load(['funcao', 'contrato', 'centro_custo', 'usuario']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Colaborador $colaborador)
    {
        $request->validate(
            rules: [
                'funcao'=> "required",
                'contrato'=> "required",
                'contrato_centro_custo'=> "required",
                'user'=> "",
                'nome' => "required",
            ]
        );
        $colaborador->update(
            $request->all()
        );
        return $colaborador;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        return $colaborador->delete();
    }
}
