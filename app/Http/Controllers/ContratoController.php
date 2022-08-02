<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContratoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-contrato')) {
            abort(403);
        }
        return Contrato::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-contrato')) {
            abort(403);
        }
        return Contrato::all()->load('perfil');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        if (! Gate::allows('show-contrato', $contrato)) {
            abort(403);
        }
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
        if (! Gate::allows('show-contrato', $contrato)) {
            abort(403);
        }
        return $contrato->load('perfil');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-contrato')) {
            abort(403);
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        if (! Gate::allows('update-contrato', $contrato)) {
            abort(403);
        }
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
        if (! Gate::allows('delete-contrato', $contrato)) {
            abort(403);
        }
        return $contrato->delete();
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
}
