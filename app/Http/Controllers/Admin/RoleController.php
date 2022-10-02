<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Ability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_role');
       $roles =Role::paginate(10);
       return view('Role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      Gate::authorize('add_role');
      $abitities=Ability::all();
      return view('Role.create',compact('abitities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_role');
        $request->validate([
            'name'=>'required',
        ]);
       $role=Role::create([
            'name'=>$request->name,
        ]);
        $role->abilities()->attach( $request->ability);

        return redirect()->route('admin.role.index')->
        with('msg', 'Role added successfully')->with('type', 'success');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('all_role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      Gate::authorize('edit_role');
      $role =Role::find($id);
      $abitities=Ability::all();
      return view('Role.edit',compact('abitities','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('edit_role');
        $role =Role::find($id);
        $request->validate([
            'name'=>'required',
        ]);
       $role->update([
            'name'=>$request->name,
        ]);
        $role->abilities()->sync( $request->ability);

        return redirect()->route('admin.role.index')->
        with('msg', 'Role update successfully')->with('type', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_role');
      $role =Role::find($id);
      $role->delete();

      return redirect()->route('admin.role.index')->
      with('msg', 'Role delete successfully')->with('type', 'success');
    }


}
