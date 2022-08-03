<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PerfilController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-perfil')) {
            abort(403);
        }
        return Perfil::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-perfil')) {
            abort(403);
        }
        return Perfil::all()->load('perfil');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        if (! Gate::allows('show-perfil', $perfil)) {
            abort(403);
        }
        return $perfil;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show_full(Perfil $perfil)
    {
        if (! Gate::allows('show-perfil', $perfil)) {
            abort(403);
        }
        return $perfil->load('perfil');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-perfil')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        return Perfil::create(
            $request->all()
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        if (! Gate::allows('update-perfil', $perfil)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        $perfil->update(
            $request->all()
        );
        return $perfil;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        if (! Gate::allows('delete-perfil', $perfil)) {
            abort(403);
        }
        return $perfil->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Perfil::all(['id as value','descricao as text']);
    }
}
