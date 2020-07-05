<?php

namespace App\Http\Controllers;

use App\SitesCustomer;
use App\Catalog;
use App\Sites;
use Illuminate\Http\Request;

class SitesCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = SitesCustomer::All()->toArray(); 
        return response()->json($sites,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::get();
        $sites = Sites::get();
        return view('site_customer.create')->with('catalogs',$catalogs)->with('sites',$sites);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = SitesCustomer::where('name','like', '%'.strtolower($request->name).'%');
        if($site->count()){
            return response()->json(['data' => $site->first(), 'msj' => 'Ya existe un sitio con este nombre!'],200);
        }
        $site = new SitesCustomer;
        $site->fill($request->all());
        
        if($site->save()){
            return response()->json(['data' => $site->first(), 'msj' => 'Sitio registrado exitosamente!'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SitesCustomer  $sitesCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(SitesCustomer $sitesCustomer)
    {
        return response()->json($sitesCustomer,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SitesCustomer  $sitesCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(SitesCustomer $sitesCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SitesCustomer  $sitesCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SitesCustomer $sitesCustomer)
    {
        $sitesCustomer->fill($request->all());
        
        if($sitesCustomer->save()){
            return response()->json(['data' => $sitesCustomer, 'msj' => 'Sitio modificado exitosamente!'],200);
        }else{
            return response()->json(['data' => $sitesCustomer, 'msj' => 'No existe el sitio indicado'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SitesCustomer  $sitesCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(SitesCustomer $sitesCustomer)
    {
        if($sitesCustomer->active==true){
            $sitesCustomer->active=false;
            $status='desactiva';
        }else{
            $sitesCustomer->active=true;
            $status='activa';
        }
        
        if($sitesCustomer->save()){
            return response()->json(['data' => $sitesCustomer, 'msj' => 'Sitio '.$status.'do exitosamente!'],200);
        }else{
            return response()->json(['data' => $sitesCustomer, 'msj' => 'No se pudo '.$status.'r el sitio indicado'],200);
        }
    }
}
