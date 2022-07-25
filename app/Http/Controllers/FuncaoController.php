<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Funcao::all();
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
            ]
        );
        return Funcao::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcao  $funcao
     * @return \Illuminate\Http\Response
     */
    public function show(Funcao $funcao)
    {
        return $funcao;
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
        return $funcao->delete();
    }
}
