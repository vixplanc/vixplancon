<?php

namespace App\Http\Controllers;

use App\Models\Autorizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AutorizadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-autorizado')) {
            abort(403);
        }
        return Autorizado::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-autorizado')) {
            abort(403);
        }
        return Autorizado::all()->load('autorizado');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function show(Autorizado $autorizado)
    {
        if (! Gate::allows('show-autorizado', $autorizado)) {
            abort(403);
        }
        return $autorizado;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function show_full(Autorizado $autorizado)
    {
        if (! Gate::allows('show-autorizado', $autorizado)) {
            abort(403);
        }
        return $autorizado->load('autorizado');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-autorizado')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'colaborador'=> "required",
                'modulo'=> "required",
            ]
        );
        return Autorizado::create(
            $request->all()
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autorizado $autorizado)
    {
        if (! Gate::allows('update-autorizado', $autorizado)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'colaborador'=> "required",
                'modulo'=> "required",
            ]
        );
        $autorizado->update(
            $request->all()
        );
        return $autorizado;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autorizado $autorizado)
    {
        if (! Gate::allows('delete-autorizado', $autorizado)) {
            abort(403);
        }
        return $autorizado->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Autorizado::all(['id as value','descricao as text']);
    }
}
