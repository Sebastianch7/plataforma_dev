<?php

namespace App\Http\Controllers;

use App\visitaDomiciliaria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class VisitaDomiciliariaController extends Controller
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
        return view('visitaDomiciliaria.index');
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
     * @param  \App\visitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function show(visitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\visitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function edit(visitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\visitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\visitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(visitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }
}
