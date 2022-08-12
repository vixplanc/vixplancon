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
        if (! Gate::allows('index-consolidado')) {
            abort(403);
        }
        return ContractItem::all();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        if (! Gate::allows('index-consolidado')) {
            abort(403);
        }
        return ContractItem::all()->load(['modelo', 'contrato', 'centro_custo', 'equipamento']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function show(ContractItem $contractitem)
    {
        if (! Gate::allows('show-consolidado', $contractitem)) {
            abort(403);
        }
        return $contractitem;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consolidado  $contractitem
     * @return \Illuminate\Http\Response
     */
    public function show_full(ContractItem $contractitem)
    {
        if (! Gate::allows('show-consolidado', $contractitem)) {
            abort(403);
        }
        return $contractitem->load(['modelo', 'contrato', 'centro_custo', 'equipamento']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-consolidado')) {
            abort(403);
        }
        $request->validate(
            rules: [
                'equipment_model_id'=> 'required',
                'contract'=> 'required',
                'cost_center'=> 'required',
                'equipment_id'=> 'required',
                'status'=> 'required',
                'contractual'=> 'required',
                'prefix'=> 'required',
                'contract_regime'=> 'required',
                'sap_code'=> 'required',
            ]
        );
        // $input = $request->all();
        // $input['contratual'] = true;
        return ContractItem::create(
            // $input
            $request->all()
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
        if (! Gate::allows('update-consolidado', $contractitem)) {
            abort(403);
        }
        $request->validate(
            rules: [
                'equipment_model_id'=> 'required',
                'contract'=> 'required',
                'cost_center'=> 'required',
                'equipment_id'=> 'required',
                'status'=> 'required',
                'contractual'=> 'required',
                'prefix'=> 'required',
                'contract_regime'=> 'required',
                'sap_code'=> 'required',
            ]
        );
        $contractitem->update(
            $request->all()
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
        if (! Gate::allows('delete-consolidado', $contractitem)) {
            abort(403);
        }
        $contractitem->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function front_select()
    {
        if (! Gate::allows('index-consolidado')) {
            abort(403);
        }
        return ContractItem::all(['id as value','prefixo as text']);
    }
}
