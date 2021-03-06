<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Habitacion;
use App\Ubicacion;
use App\Universidad;
use Auth;
use App\Caracteristica;

class UsersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['create','store','userActivation']]);
  }

  public function index(Request $request){
    $tipo_usuario = Auth::user()->tipo_usuario;
    switch ($tipo_usuario) {
      case 'arrendador':
      $habitaciones = Auth::user()->habitaciones;
      // dd($habitaciones);
      foreach ($habitaciones as $habitacion) {
        $habitacion->ofertas;
      }
      return view('users.arrendadores.index')->with('habitaciones',$habitaciones);
      break;
      case 'arrendatario':
      return view('users.estudiantes.index');
      break;
      case 'admin':
      if(isset($request->email)){
        $users = User::searchUser($request->email);
      }else{
        $users = User::orderBy('id','ASC')->get();
      }
      foreach ($users as $user) {
        $user->habitaciones;
      }
      $ubicaciones = Ubicacion::orderBy('ciudad','ASC')->get();
      $ciudades = Ubicacion::orderBy('ciudad','ASC')->pluck('ciudad','id');
      $universidades = Universidad::all();
      foreach($universidades as $universidad){
        $universidad->ubicacion;
        $universidad->habitaciones;
      }
      // dd($universidades);
      return view('users.admin.index')->with('users',$users)->with('ubicaciones',$ubicaciones)->with('universidades',$universidades)->with('ciudades',$ciudades);
      break;
      default:
      break;
    }
  }


  public function create(){
    $caracteristicas=Caracteristica::orderBy('id','ASC')->pluck('nombre','id');

    return view('auth.register')->with('caracteristicas',$caracteristicas);
  }

  public function store(UserRequest $request){
    $user = new User($request->all());
    $data = $request->all();
    if ($request->repeat_password == $request->password) {
      $user->password = bcrypt($request->password);
      $token = str_random(30);
      $user->token = $token;
      $data["token"] = $token;
      Mail::send('emails.activation', $data, function ($message) use ($data) {
        $message->to($data['email'], $data['nombre'])->subject('Mail confirmation');
      });

      $user->save();
      $user->caracteristicas()->sync($request->caracteristicas);
      Flash::success(ucfirst($user->name)." Please check your email");
      return view('welcome');
    } else {
      Flash::warning("No se pudo registrar");
      return back();
    }
  }

  public function edit($id){
    if (Auth::user()->id == $id || Auth::user()->isAdmin()) {
      $user = User::find($id);
      switch ($user->tipo_usuario) {
        case 'arrendador':
        return view('users.arrendadores.edit')->with('user',$user);
        break;
        case 'arrendatario':
        return view('users.estudiantes.edit')->with('user',$user);
        break;
        case 'admin':
        return view('users.admin.edit')->with('user',$user);
        break;
        default:
        break;
      }
    }else{
      abort(401);
    }
  }
  public function show($id){
    $user = User::find($id);
    if ($user->numero_votos > 0) {
      $valoracionUser = $user->calificacion/$user->numero_votos;
    }else{
      $valoracionUser = $user->calificacion;
    }
    return view('users.templates.show')->with('user',$user)->with('valUser',$valoracionUser);
  }
  public function update(Request $request,$id){
    // dd($request->all());
    $user = User::find($id);
    $user->fill($request->all());
    $user->save();
    Flash::info('Datos actualizados correctamente');
    return redirect()->route('users.index');
  }

  public function destroy($id){
    if(Auth::user()->id == $id || Auth::user()->isAdmin()){
      Auth::logout();
      $user = User::find($id);
      $user->delete();
      Flash::error('Usuario Eliminado');
      return redirect()->route('welcome');
    }else{
      abort(401);
    }
  }

  public function calificar($id,$valor){
    $user = User::find($id);
    $calificacion = $user->calificacion;
    $votos = $user->numero_votos;
    $user->calificacion = $calificacion + $valor;
    $user->numero_votos = $votos + 1;
    $user->save();
    Flash::success('Valoracion registrada existosamente');
    return redirect()->route('users.show',$user);
  }

  public function userActivation($token){
    $check = User::where('token','=',$token)->first();
    if(!is_null($check)){
      $user = User::find($check->id);
      if($user->activeAccount()){
        Flash::warning('User are already actived');
        return redirect()->route('login');
      }
      $user->update(['activated' => 1]);
      Flash::success('User active successfully');
      return redirect()->route('login');
    }
    Flash::warning('Your token is invalid');
    return redirect()->route('login');
  }
}
