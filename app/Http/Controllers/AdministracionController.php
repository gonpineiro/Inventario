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

use Illuminate\Support\Facades\Hash;

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
    return view('administracion.users_host', [
      'users' => $user,
      'departaments' => $departament,
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

  public function showHistorials(Request $request){

    $historial = Historial::orderBy('id','desc')->get();
        //  dd($historial[0]->id);
        //  $user = User::all();
        //  $host = Host::all();

    return view('administracion.historial', [
      // 'users' => $user,
      'historials' => $historial,
      //'hosts' => $host,
    ]);

  }


  public function showDepartaments(Request $request){
    $departament = Departament::all();
    $cliente = Cliente::all();
    //dd($cliente);
    //dd($departament);

    return view('administracion.departaments', [
      'clientes' => $cliente,
      'departaments' => $departament,
    ]);

  }

  public function createDepartament(Request $request){
    $departament = Departament::create([
    'name' => $request->input('name'),
    'cliente_id' =>$request->input('cliente_id'),
  ]);
  return redirect('/departaments');
  }

}
