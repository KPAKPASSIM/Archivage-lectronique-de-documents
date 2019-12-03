<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   public function __construct() {

      $this->middleware('permission:index role')->only('index');
      $this->middleware('permission:edit role')->only('edit');
      $this->middleware('permission:update role')->only('update');
      $this->middleware('permission:store role')->only('store');
      $this->middleware('permission:delete role')->only('destroy');
      $this->middleware('permission:create role')->only('create');
      $this->middleware('permission:show role')->only('show');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $model)
    {
        return view('role.index', ['roles' => $model->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = $request->permission?? [];
                $name = $request->name?? '';
        $role = Role::create(['name'=>$name]);
        $role = Role::findByName($name);
        $role->syncPermissions($permissions);
        return redirect()->route("role.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        if(empty($role)){
            return redirect(route('role.index'));
        }
        $rolePermissions= [];
        foreach($role->permissions as $permission){
            array_push($rolePermissions,$permission['id']);
        }
        $permissions= Permission::all();
        return view('role.edit', [
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        ]);
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
        $role= Role::findOrFail($id);
        if(empty($role)){
            return redirect(route('roles.index'));
        }
        $permissions= $request->permissions?? [];
        $name= $request->name?? [];
        $role->name = $name;
        $role->save();
        $role->syncPermissions($permissions);

        return redirect()->route('role.index')->withStatus(__('role modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        Role::destroy($role);

        return redirect()->route('role.index')->withStatus(__('Rôle supprimé avec succès.'));
    }
}
