<?php

namespace App\Http\Controllers;

use app\User;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

class UserController extends Controller
{

  public function showUsers(Request $request){
    $user = User::all();
    $role = Role::all();
    return view('administracion.users', [
      'users' => $user,
      'roles' => $role,
    ]);

  }

  public function createUser(Request $request){

        $user = User::create([
        'name' => $request->input('name'),
        'email' =>$request->input('email'),
        'password' => Hash::make($request->input('password')),
        ]);


    return redirect('/users');
  }

  public function editUser($id, Request $request){
    $user = User::all();
    $onlyUser = $this->findByIdUser($id);
    $role = Role::all();

      return view('administracion.users', [
          'users' => $user,
          'onlyUser' => $onlyUser,
          'roles' => $role,
      ]);

  }

  private function findByIdUser($id){
      return User::where('id', $id)->firstOrFail();
  }
}
