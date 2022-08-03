<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ColaboradorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-colaborador')) {
            abort(403);
        }
        return Colaborador::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-colaborador')) {
            abort(403);
        }
        return Colaborador::all()->load('perfil');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show(Colaborador $colaborador)
    {
        if (! Gate::allows('show-colaborador', $colaborador)) {
            abort(403);
        }
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
        if (! Gate::allows('show-colaborador', $colaborador)) {
            abort(403);
        }
        return $colaborador->load('perfil');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-colaborador')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'funcao'=> "required",
                'contrato'=> "required",
                'centro_custo'=> "required",
                'user'=> "",

                'nome' => "required",
                'ativo' => "nullable",
            ]
        );
        return Colaborador::create(
            $request->all()
        );
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
        if (! Gate::allows('update-colaborador', $colaborador)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'funcao'=> "required",
                'contrato'=> "required",
                'centro_custo'=> "required",
                'user'=> "",

                'nome' => "required",
                'ativo' => "nullable",
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
        if (! Gate::allows('delete-colaborador', $colaborador)) {
            abort(403);
        }
        return $colaborador->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Colaborador::all(['id as value','descricao as text']);
    }
}
