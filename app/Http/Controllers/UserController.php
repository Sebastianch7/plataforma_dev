<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
 public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      return view('user.index',
        [
          'users' => DB::table('users')->join('companies', 'companies.id', '=', 'users.company')->join('roles', 'roles.id', '=', 'users.role')->select('users.*','companies.name as company','roles.name as role')->where('users.state','=','1')->orderBy('id','desc')->Paginate(10),
          'cant' => DB::table('users')->where('state','=','1')->count(),
          'companies' => DB::table('companies')->get(),
          'roles' => DB::table('roles')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create',[
        'companies' => DB::table('companies')->get(),
        'roles' => DB::table('roles')->where('id','>','2')->get(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

      $password = $request->name.$request->company;
      user::create([
        'idNumber' => $request->idNumber,
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'phone' => $request->phone,
        'company' => $request->company,
        'role'  => $request->role,
        'state' => '1',
        'email_verified_at' => now(),
        'password' => bcrypt($password),
      ]);
      return redirect('/user')->with('status','El registro de '.$request->name.' '.$request->lastname.' ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function sideface()
    {
     return view('user.sideface',[
      'user' => DB::table('users')->where('id','=',auth()->user()->id)->get(),
    ]);
   }

   public function search(Request $request)
   {
     return view('user.index',
      [
        'users' => DB::table('users')->join('companies', 'companies.id', '=', 'users.company')->join('roles', 'roles.id', '=', 'users.role')->select('users.*','companies.name as company','roles.name as role')->where('users.idNumber','like','%'.$request->data.'%')->orderBy('name','asc')->Paginate(5),
        'cant' => DB::table('users')->where('users.idNumber','like','%'.$request->data.'%')->count(),
        'companies' => DB::table('companies')->get(),
        'roles' => DB::table('roles')->where('id','>','2')->get(),
      ]);

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
     $user = User::find($user);
     
     return view('user.edit', [
      'users' => $user,
      'states' => DB::table('states')->get(),
    ]);
   }

   public function edituser($user)
   {
     $user = User::find($user);
         // 
     return view('user.edituser', [
      'users' => $user,
      'states' => DB::table('states')->whereBetween('id',[1,2])->get(),
    ]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->all());
      return redirect('/sideface')->with('status','el usuario ha sido actualizado.');
    }
    
    public function updateuser(Request $request, User $user)
    {
      $act = DB::table('users')
      ->where('id', $user->id)
      ->update(['state' => $request->state]);
      return redirect('/user')->with('status','el usuario ha sido actualizado.');
    }


  }
