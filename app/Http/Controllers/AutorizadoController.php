<?php

namespace App\Http\Controllers;

use App\Models\Autorizado;
use Illuminate\Http\Request;

class AutorizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Autorizado::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'colaborador'=> "required",
                'modulo'=> "required",
            ]
        );
        return Autorizado::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function show(Autorizado $autorizado)
    {
        return $autorizado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autorizado  $autorizado
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorizado $autorizado)
    {
        //
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
        $autorizado->delete();
    }
}
