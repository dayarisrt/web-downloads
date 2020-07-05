<?php

namespace App\Http\Controllers;

use App\Sites;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Sites::All()->toArray(); 
        return response()->json($sites,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = Sites::where('name','like', '%'.strtolower($request->name).'%');
        if($site->count()){
            return response()->json(['data' => $site->first(), 'msj' => 'Ya existe un sitio con este nombre!'],200);
        }
        $site = new Sites;
        $site->fill($request->all());
        
        if($site->save()){
            return response()->json(['data' => $site->first(), 'msj' => 'Sitio registrado exitosamente!'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sites  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Sites $site)
    { 
        return response()->json($site,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sites  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Sites $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sites  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sites $site)
    {
        $site->fill($request->all());
        
        if($site->save()){
            return response()->json(['data' => $site, 'msj' => 'Sitio modificado exitosamente!'],200);
        }else{
            return response()->json(['data' => $site, 'msj' => 'No existe el sitio indicado'],200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sites  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sites $site)
    {
        if($site->active==true){
            $site->active=false;
            $status='desactiva';
        }else{
            $site->active=true;
            $status='activa';
        }
        
        if($site->save()){
            return response()->json(['data' => $site, 'msj' => 'Sitio '.$status.'do exitosamente!'],200);
        }else{
            return response()->json(['data' => $site, 'msj' => 'No se pudo '.$status.'r el sitio indicado'],200);
        }
    }
}
