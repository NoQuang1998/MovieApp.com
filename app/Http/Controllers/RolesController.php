<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParents = Permissions::where('parent_id', 0)->get();
        return view('roles.add', compact('permissionParents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('permission_id');
            $role = Roles::create($data);
            // permission
            $role->permission()->attach($request->permission_id);
            DB::commit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            DB::rollback();
        }
        return redirect()->route('list.roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        $permissionParents = Permissions::all()->where('parent_id', 0);
        $permission_checked = $role->permission()->get();
        return view('roles.edit', compact('role', 'permissionParents', 'permission_checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {
        $data = $request->except('permission_id');
        $role->update($data);
        $role->permission()->sync($request->permission_id);
        return redirect()->route('list.roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        $role->delete();
        return redirect()->route('list.roles');
    }
}
