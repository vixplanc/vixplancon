<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ModuloController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('index-modulo')) {
            abort(403);
        }
        return Modulo::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-modulo')) {
            abort(403);
        }
        return Modulo::all()->load('modulo');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        if (! Gate::allows('show-modulo', $modulo)) {
            abort(403);
        }
        return $modulo;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show_full(Modulo $modulo)
    {
        if (! Gate::allows('show-modulo', $modulo)) {
            abort(403);
        }
        return $modulo->load('modulo');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-modulo')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
                'nome'=> "required"
            ]
        );
        return Modulo::create(
            $request->all()
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        if (! Gate::allows('update-modulo', $modulo)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'descricao' => "required",
                'nome'=> "required"
            ]
        );
        $modulo->update(
            $request->all()
        );
        return $modulo;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        if (! Gate::allows('delete-modulo', $modulo)) {
            abort(403);
        }
        return $modulo->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Modulo::all(['id as value','descricao as text']);
    }
}
