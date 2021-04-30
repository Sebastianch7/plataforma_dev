<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perm = DB::table('permission_users')->where('permission_users.idRole','=',auth()->user()->role)->get();
        // $permission = DB::table('permission_users')->where('permission_users.idRole','=',auth()->user()->role)->get();
        return view('home',[
            //'permissions' => Arr::flatten(DB::table('permission_users')->where('permission_users.idRole','=',auth()->user()->role)->get()),
        ]);
        
    }
}
