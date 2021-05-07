<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
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
        return view('company.index',[
            'companies' => DB::table('companies')->where('companies.state','=','1')->orderBy('id','desc')->Paginate(10),
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
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        company::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'address'  => $request->address,
        'state' => '1',
      ]);
      return redirect('/company')->with('status','El cliente '.$request->name.' '.$request->lastname.' ha sido creado.');
    }

    public function search(Request $request)
   {
        return view('company.index',[
            'companies' => DB::table('companies')->where('companies.name','like','%'.$request->data.'%')->orderBy('id','desc')->Paginate(5),
            'cant'=>DB::table('companies')->where('companies.name','like','%'.$request->data.'%')->count(),
        ]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
         return view('company.edit', [
            'company' => $company,
            'states' => DB::table('states')->whereBetween('id', [1, 2])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company )
    {
        $company->update($request->all());
      return redirect('/company')->with('status','el cliente ha sido actualizado.');
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
