<?php

namespace App\Http\Controllers;

use App\Models\Consolidado;
use Illuminate\Support\Facades\Gate;
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
        if (! Gate::allows('view')) {
            abort(403);
        }
        return Consolidado::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('view')) {
            abort(403);
        }
        return Consolidado::all()->load(['modelo', 'contrato', 'centro_custo', 'equipamento']);
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
        if (! Gate::allows('create')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'modelo'=> 'required',
                'contrato'=> 'required',
                'contrato_centro_custo'=> 'required',
                'equipamento'=> '',
                'status'=> 'required',
                'contratual'=> '',
                'prefixo'=> 'required',
                'regime'=> 'required',
                'codigo_sap'=> 'required',
            ]
        );
        $input = $request->all();
        $input['contratual'] = true;
        // dd($input);
        return Consolidado::create(
            $input
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
        if (! Gate::allows('viewAny', $consolidado)) {
            abort(403);
        }
        return $consolidado;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $consolidado
     * @return \Illuminate\Http\Response
     */
    public function show_full(Consolidado $consolidado)
    {
        if (! Gate::allows('viewAny', $consolidado)) {
            abort(403);
        }
        return $consolidado->load(['modelo', 'contrato', 'centro_custo', 'equipamento']);
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
        if (! Gate::allows('update', $consolidado)) {
            abort(403);
        }
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
        if (! Gate::allows('delete', $consolidado)) {
            abort(403);
        }
        $consolidado->delete();
    }
}
