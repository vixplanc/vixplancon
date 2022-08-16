<?php

namespace App\Http\Controllers;

use App\Models\ContractItem;
use App\Policies\ConsolidadoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ContractItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('index-consolidado')) {
        //     abort(403);
        // }
        return ContractItem::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        // if (! Gate::allows('index-consolidado')) {
        //     abort(403);
        // }
        return ContractItem::all()->load(['equipment_model', 'contract', 'cost_center', 'equipment']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function show(ContractItem $contractitem)
    {
        // if (! Gate::allows('show-consolidado', $contractitem)) {
        //     abort(403);
        // }
        // dd($contractitem);
        return [
            'id'=> $contractitem->id,
            'modelo_id'=> $contractitem->equipment_model_id,
            'contrato'=> $contractitem->contract_id,
            'contrato_centro_custo'=> $contractitem->cost_center,
            'equipamento'=> $contractitem->equipments_id,
            'status'=> $contractitem->status,
            'contratual'=> $contractitem->contractual,
            'prefixo'=> $contractitem->prefix,
            'regime'=> $contractitem->contract_regime,
            'codigo_sap'=> $contractitem->sap_code,
        ];


        // $contractitem;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function show_full(ContractItem $contractitem)
    {
        // if (! Gate::allows('show-consolidado', $contractitem)) {
        //     abort(403);
        // }
        return $contractitem->load(['equipment_model', 'contract', 'cost_center', 'equipment']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('create-consolidado')) {
        //     abort(403);
        // }
        // dd($request->all());
        $payload = $request->all();
        $request->validate(
            rules: [
                'modelo_id'=> 'required',
                'contrato'=> 'required',
                'contrato_centro_custo'=> 'required',
                'equipamento'=> 'required',
                'status'=> 'required',
                'contratual'=> 'required',
                'prefixo'=> 'required',
                'regime'=> 'required',
                'codigo_sap'=> 'required',
            ]
        );


        // $input = $request->all();
        // $input['contratual'] = true;
        return ContractItem::create(
            [
                'equipment_model_id'=> $payload["modelo_id"],
                'contract_id'=> $payload["contrato"],
                'cost_center'=> $payload["contrato_centro_custo"],
                'equipment_id'=> $payload["equipamento"],
                'status'=> $payload["status"],
                'contractual'=> $payload["contratual"]?true:false,
                'prefix'=> $payload["prefixo"],
                'contract_regime'=> $payload["regime"],
                'sap_code'=> $payload["codigo_sap"],
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractItem $contractitem)
    {
        // if (! Gate::allows('update-consolidado', $contractitem)) {
        //     abort(403);
        // }
        // dd($request->all());
        $request->validate(
            rules: [
            ]
        );
        $payload = $request->all();
        $contractitem->update(
            [
                'equipment_model_id'=> $payload["modelo_id"],
                'contract_id'=> $payload["contrato"],
                'cost_center'=> $payload["contrato_centro_custo"],
                'equipment_id'=> $payload["equipamento"],
                'status'=> $payload["status"],
                'contractual'=> $payload["contratual"]?true:false,
                'prefix'=> $payload["prefixo"],
                'contract_regime'=> $payload["regime"],
                'sap_code'=> $payload["codigo_sap"],
            ]
        );
        return $contractitem;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractItem $contractitem)
    {
        // if (! Gate::allows('delete-consolidado', $contractitem)) {
        //     abort(403);
        // }
        $contractitem->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function front_select()
    {
        // if (! Gate::allows('index-consolidado')) {
        //     abort(403);
        // }
        return ContractItem::all(['id as value','prefix as label']);
    }
}
