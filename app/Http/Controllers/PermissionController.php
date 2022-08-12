<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Permission::all();
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
                'user_id'=> "required",
                'system_module_id'=> "required",
            ]
        );
        return Permission::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autorizado  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autorizado  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autorizado  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate(
            rules: [
                'user_id'=> "required",
                'system_module_id'=> "required",
            ]
        );
        $permission->update(
            $request->all()
        );
        return $permission;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autorizado  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
    }
}
