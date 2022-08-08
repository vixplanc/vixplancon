<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EquipamentoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(
            ability:'viewAny',
            arguments: Equipamento::class
        );
        return Equipamento::all();
    }


    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index_full()
    // {
    //     if (! Gate::allows('index-equipamento')) {
    //         abort(403);
    //     }
    //     return Equipamento::all()->load('modelo');
    // }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Equipamento  $equipamento
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Equipamento $equipamento)
    // {
    //     if (! Gate::allows('show-equipamento', $equipamento)) {
    //         abort(403);
    //     }
    //     return $equipamento;
    // }


    // /**
    //  * Display the specified resource with all relationships.
    //  *
    //  * @param  \App\Models\Equipamento  $equipamento
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show_full(Equipamento $equipamento)
    // {
    //     if (! Gate::allows('show-equipamento', $equipamento)) {
    //         abort(403);
    //     }
    //     return $equipamento->load('modelo');
    // }



    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     if (! Gate::allows('create-equipamento')) {
    //         abort(403);
    //     }
    //     $request->validate(
    //         rules: [
    //             'modelo_id' => "required",
    //             'denominacao' => "required",
    //             'placa' => "required",
    //             'chassi' => "required",
    //         ]
    //     );
    //     return Equipamento::create(
    //         $request->all()
    //     );
    // }


    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Equipamento  $equipamento
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Equipamento $equipamento)
    // {
    //     if (! Gate::allows('update-equipamento', $equipamento)) {
    //         abort(403);
    //     }
    //     $request->validate(
    //         rules: [
    //             'modelo_id' => "required",
    //             'denominacao' => "required",
    //             'placa' => "required",
    //             'chassi' => "required",
    //         ]
    //     );
    //     $equipamento->update(
    //         $request->all()
    //     );
    //     return $equipamento;
    // }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Equipamento  $equipamento
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Equipamento $equipamento)
    // {
    //     if (! Gate::allows('delete-equipamento', $equipamento)) {
    //         abort(403);
    //     }
    //     return $equipamento->delete();
    // }


    // /**
    //  * Display a listing of the resource to a front select.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function front_select()
    // {
    //     if (! Gate::allows('index-equipamento')) {
    //         abort(403);
    //     }
    //     return Equipamento::all(['id as value','denominacao as text']);
    // }
}
