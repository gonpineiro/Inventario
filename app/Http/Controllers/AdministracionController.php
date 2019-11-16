<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Host;
use App\Historial;
use App\Departament;
use App\Cliente;
use App\User_host;
use Carbon\Carbon;

class AdministracionController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()  {
      $this->middleware('auth');
    }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index() {
      return view('administracion');

  }

  public function showUsershost(Request $request){
    $user = User_host::all();
    $departament = Departament::all();
    $ver = "agregar";
    return view('administracion.users_host', [
      'users' => $user,
      'departaments' => $departament,
      'ver' => $ver,
    ]);

  }

  public function createUserhost(Request $request){

        $user = User_host::create([
        'name' => $request->input('name'),
        'apellido' => $request->input('apellido'),
        'email' =>$request->input('email'),
        'departament_id' =>$request->input('departament'),
      ]);
    return redirect('/users_host');
  }

  public function editUserhost($id, Request $request){
    $user = User_host::all();
    $departament = Departament::all();
    $onlyUserHost = $this->findByIdUserHost($id);
    $ver = "editar";

      return view('administracion.users_host', [
          'users' => $user,
          'onlyUserHost' => $onlyUserHost,
          'ver' => $ver,
          'departaments' => $departament,
      ]);

  }

  public function updateUserHost($id, Request $request){

      $onlyUserHost = $this->findByIdUserHost($id);
      $onlyUserHost->name = $request->input('name');
      $onlyUserHost->apellido = $request->input('apellido');
      $onlyUserHost->email = $request->input('email');
      $onlyUserHost->departament_id = $request->input('departament_id');
      $onlyUserHost->save();

      return redirect('/users_host/');
    }



  public function showHistorials(Request $request){

    $historial = Historial::orderBy('id','desc')->get();

    return view('administracion.historial', [
      'historials' => $historial,
    ]);

  }


  public function showDepartaments(Request $request){
    $departament = Departament::all();
    $cliente = Cliente::all();
    $ver = "agregar";

    return view('administracion.departaments', [
      'clientes' => $cliente,
      'departaments' => $departament,
      'ver' => $ver,
    ]);

  }

  public function createDepartament(Request $request){
    $departament = Departament::create([
    'name' => $request->input('name'),
    'cliente_id' =>$request->input('cliente_id'),
  ]);
  return redirect('/departaments');
  }

  public function editDepartament($id, Request $request){
    $departament = Departament::all();
    $cliente = Cliente::all();
    $onlyDerpartament = $this->findByIdDepartament($id);
    $ver = "editar";

      return view('administracion.departaments', [
          'clientes' => $cliente,
          'onlyDerpartament' => $onlyDerpartament,
          'ver' => $ver,
          'departaments' => $departament,
      ]);

  }

  public function updateDepartament($id, Request $request){

      $onlyDerpartament = $this->findByIdDepartament($id);
      $onlyDerpartament->name = $request->input('name');
      $onlyDerpartament->cliente_id = $request->input('cliente_id');
      $onlyDerpartament->save();

      return redirect('/departaments/');
    }

  private function findByIdUserHost($id){
      return User_host::where('id', $id)->firstOrFail();
  }

  private function findByIdDepartament($id){
      return Departament::where('id', $id)->firstOrFail();
  }

}
