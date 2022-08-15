<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContractController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('index-contract')) {
        //     abort(403);
        // }
        return Contract::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        // if (! Gate::allows('index-contract')) {
        //     abort(403);
        // }
        return Contract::all()->load('ContractProfile');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        // if (! Gate::allows('show-contract', $contract)) {
        //     abort(403);
        // }
        return $contract;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show_full(Contract $contract)
    {
        // if (! Gate::allows('show-contract', $contract)) {
        //     abort(403);
        // }
        return $contract->load('ContractProfile');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('create-contract')) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'contract_profile_id' => "required",
                'description' => "required",
                'cost_center' => "required",
                'begin' => "required",
                'end' => "required",
            ]
        );
        return Contract::create(
            $request->all()
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        // if (! Gate::allows('update-contract', $contract)) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'contract_profile_id' => "required",
                'description' => "required",
                'cost_center' => "required",
                'begin' => "required",
                'end' => "required",
            ]
        );
        $contract->update(
            $request->all()
        );
        return $contract;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        if (! Gate::allows('delete-contract', $contract)) {
            abort(403);
        }
        return $contract->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return Contract::all(['id as value','description as text']);
    }
}
