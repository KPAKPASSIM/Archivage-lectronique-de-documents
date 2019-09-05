<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function __construct() {

       $this->middleware('permission:index userRole')->only('index');
       $this->middleware('permission:edit userRole')->only('edit');
       $this->middleware('permission:update userRole')->only('update');
       $this->middleware('permission:store userRole')->only('store');
       $this->middleware('permission:delete userRole')->only('destroy');
       $this->middleware('permission:create userRole')->only('create');
       $this->middleware('permission:show userRole')->only('show');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view ('userRoles.index')
            ->with('users', $users);
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
        //
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
       $user = User::find($id);

       if(empty($user)){
           return redirect(route('userRole.index'));
       }
       // dd($id);
       $userRoles = [];
       foreach ($user->roles as $role){
           array_push($userRoles,$role['id']);
       }
       //dd($userRoles);
       $roles = Role::all();
       return view('userRoles.edit', [
           'user'=> $user,
           'roles'=>$roles,
           'userRoles'=>$userRoles
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
        $user = User::find($id);
        if(empty($user)){
            return redirect(route('userRoles.index'));
        }
        $roles= $request->roles?? [];
        $name= $request->name?? [];
        $user->name = $name;
        $user->save();
        $user->syncRoles($roles);

        return redirect()->route('userRole.index')->withStatus(__('role modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
