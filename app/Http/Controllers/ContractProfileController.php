<?php

namespace App\Http\Controllers;

use App\Models\ContractProfile;
use Illuminate\Http\Request;

class ContractProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContractProfile::all();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return ContractProfile::all(['id as value','description as text']);
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
        return ContractProfile::create(
            [
                'description' => $request->all()["descricao"]
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContractProfile  $contract_profile
     * @return \Illuminate\Http\Response
     */
    public function show(ContractProfile $contract_profile)
    {
        return $contract_profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContractProfile  $contract_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractProfile $contract_profile)
    {
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        $contract_profile->update(
            [
                'description' => $request->all()["descricao"]
            ]
        );
        return $contract_profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContractProfile  $contract_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractProfile $contract_profile)
    {
        return $contract_profile->delete();
    }
}
