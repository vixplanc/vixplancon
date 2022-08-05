<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FuncaoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-funcao')) {
            abort(403);
        }
        return Funcao::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-funcao')) {
            abort(403);
        }
        return Funcao::all()->load('perfil');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show(Funcao $funcao)
    {
        if (! Gate::allows('show-funcao', $funcao)) {
            abort(403);
        }
        return $funcao;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show_full(Funcao $funcao)
    {
        if (! Gate::allows('show-funcao', $funcao)) {
            abort(403);
        }
        return $funcao->load('perfil');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-funcao')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        return Funcao::create(
            $request->all()
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcao $funcao)
    {
        if (! Gate::allows('update-funcao', $funcao)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        $funcao->update(
            $request->all()
        );
        return $funcao;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcao $funcao)
    {
        if (! Gate::allows('delete-funcao', $funcao)) {
            abort(403);
        }
        return $funcao->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Funcao::all(['id as value','descricao as text']);
    }
}
