<?php

namespace App\Http\Controllers;

use App\Solicitude;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudeRequest;
use Illuminate\Support\Facades\DB;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('solicitude.index',[
        'solicitudes'=>DB::table('solicitudes')->select('solicitudes.*','states.name as state','services.name as service')->join('states', 'states.id', '=', 'solicitudes.idState')->join('services', 'services.id', '=', 'solicitudes.idService')->orderBy('id','desc')->Paginate(10),
        'cant'=>DB::table('solicitudes')->count(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('solicitude.create',[
        'services' => DB::table('services')->get(),
        'typesDocument' => DB::table('typeDocument')->get(),
        'departaments' => DB::table('departaments')->get(),
        'cities' => DB::table('cities')->get(),
      ]);
    }

    public function cities(Request $request)
    {
      $cities = DB::table('cities')->where('idDepartament','=',$request->departament)->get();
      return $cities;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudeRequest $request)
    {

      Solicitude::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'idTypeDocument' => $request->typeDocument,
        'idNumber' => $request->idNumber,
        'mail' => $request->mail,
        'phone' => $request->phone,
        'mobile' => $request->cellphone,
        'address' => $request->address,
        'postulate' => $request->postulate,
        'idDepartament' => $request->departament,
        'idCity' => $request->city,
        'idCompany' => auth()->user()->company,
        'idService' => $request->service,
        'idUser' => auth()->user()->id,
        'idState' => '3',
      ]);
      return redirect('/solicitude')->with('status','La solicitud de '.$request->name.' '.$request->lastname.' ha sido registrada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitude $solicitude)
    {
        //
    }

    public function search(Request $request)
    {
      return view('solicitude.index',
        [
         'services' => DB::table('solicitudes')->select('solicitudes.*','states.name as state','services.name as service')->join('states', 'states.id', '=', 'solicitudes.idState')->join('services', 'services.id', '=', 'solicitudes.idService')->where('solicitudes.idNumber','like','%'.$request->data.'%')->orderBy('id','desc')->Paginate(10),
         'cant' => DB::table('solicitudes')->where('solicitudes.idNumber','like','%'.$request->data.'%')->count(),
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitude $solicitude)
    {
        $solicitude = Solicitude::find($solicitude);
         
         return view('solicitude.edit', [
            'solicitude' => $solicitude,
        ]);
    }

    public function editsolicitude($solicitude)
   {
     $solicitude = Solicitude::find($solicitude);
         // 
     return view('solicitude.editsolicitude', [
      'solicitude' => $solicitude,
      'states' => DB::table('states')->get(),
    ]);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        $solicitude->update($request->all());
      return redirect('/solicitude')->with('status','La solicitud ha sido actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitude $solicitude)
    {
        //
    }
  }
