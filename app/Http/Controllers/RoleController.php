<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('role.index',
      [
        'roles' => DB::table('roles')->where('id','>','1')->paginate(10),
        'cant' => DB::table('roles')->where('id','>','1')->count(),
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('role.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(RoleRequest $request)
  {
      Role::create([
        'name' => $request->name,
        'description' => $request->description,
        'permission' => $request->permission,
      ]);
      return redirect('/role')->with('status','El perfil '.$request->name.' ha sido creado.');
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

  public function search(Request $request)
  {
   return view('role.index',
    [
      'roles' => DB::table('roles')->where('roles.name','like','%'.$request->data.'%')->Paginate(10),
      'cant' => DB::table('roles')->where('roles.name','like','%'.$request->data.'%')->count(),
    ]);
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
         
         return view('role.edit', [
            'role' => $role,
        ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, role $role)
  {
      $role->update($request->all());
      return redirect('/role')->with('status','el perfil ha sido actualizado.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
