<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
  public function showRoles(Request $request){
    $role = Role::all();
    return view('administracion.users.roles', [
      'roles' => $role,
    ]);

  }

  public function formRole(Request $request){
    $permission = Permission::all();
      return view('administracion.users.form_role', [
        'permissions' => $permission,

      ]);
    }

    public function createRole(Request $request){
          dd($request->input('permissions'));
          $permision->persmissions()->sync($request->input('permissions'));


      return redirect('/roles');
    }
}
