<?php

namespace App\Http\Controllers;

use App\service;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
      return view('service.index',[
        'services'=>DB::table('services')->orderBy('id','desc')->Paginate(10),
        'cant'=>DB::table('services')->count(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
      service::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'state' => '1',
      ]);
      return redirect('/service')->with('status','El servicio '.$request->name.' ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    public function search(Request $request)
    {
     return view('service.index',
      [
        'services' => DB::table('services')->where('services.name','like','%'.$request->data.'%')->Paginate(5),
        'cant' => DB::table('services')->where('services.name','like','%'.$request->data.'%')->count(),
      ]);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        $service = Service::find($service);
         
         return view('service.edit', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, service $service)
    {
        $service->update($request->all());
      return redirect('/service')->with('status','el servicio ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }
  }
