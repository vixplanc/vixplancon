<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployeeRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (! Gate::allows('index-employee-role')) {
        //     abort(403);
        // }
        return EmployeeRole::all();
    }


    /**
     * Display a listing of the resource with all relationships.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_full()
    {
        // if (! Gate::allows('index-employee-role')) {
        //     abort(403);
        // }
        return EmployeeRole::all()->load('employees');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeRole  $employee_role
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeRole $employee_role)
    {
        // if (! Gate::allows('show-employee-role', $employee_role)) {
        //     abort(403);
        // }
        // dd($employee_role);
        return [
            'id' => $employee_role->id,
            'descricao' => $employee_role->description,
        ];

        $employee_role;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeRole  $employee_role
     * @return \Illuminate\Http\Response
     */
    public function show_full(EmployeeRole $employee_role)
    {
        // if (! Gate::allows('show-employee-role', $employee_role)) {
        //     abort(403);
        // }
        return $employee_role->load('employees');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (! Gate::allows('create-employee-role')) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        $payload = $request->all();
        return EmployeeRole::create(
            [
                'description' => $payload['descricao'],
            ]
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeRole  $employee_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeRole $employee_role)
    {
        // if (! Gate::allows('update-employee-role', $employee_role)) {
        //     abort(403);
        // }
        $request->validate(
            rules: [
                'descricao' => "required",
            ]
        );
        $payload = $request->all();
        $employee_role->update(
            [
                'description'=>$payload['descricao'],
            ]
        );
        return $employee_role;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeRole  $employee_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeRole $employee_role)
    {
        // if (! Gate::allows('delete-employee-role', $employee_role)) {
        //     abort(403);
        // }
        return $employee_role->delete();
    }


    /**
     * Display a listing of the resource to a front select.
     *
     * @return \Illuminate\Http\Response
    */
    public function front_select()
    {
        return EmployeeRole::all(['id as value','description as label']);
    }
}
