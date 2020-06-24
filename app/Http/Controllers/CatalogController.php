<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::All()->toArray(); 
        return response()->json($catalogs,200);
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
        $catalog = Catalog::where('name','like', '%'.strtolower($request->name).'%');
        if($catalog->count()){
            return response()->json(['data' => $catalog->first(), 'msj' => 'Catálogo registrado exitosamente!'],200);
        }
        $catalog = new Catalog;
        $catalog->fill($request->all());
        
        $catalog->save();
        return response()->json(['data' => $catalog, 'state' => true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    { 
        return response()->json($catalog,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        $catalog->fill($request->all());
        
        if($catalog->save()){
            return response()->json(['data' => $catalog, 'msj' => 'Catálogo modificado exitosamente!'],200);
        }else{
            return response()->json(['data' => $catalog, 'msj' => 'No existe el catálogo indicado'],200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        if($catalog->active==true){
            $catalog->active=false;
            $status='desactiva';
        }else{
            $catalog->active=true;
            $status='activa';
        }
        
        if($catalog->save()){
            return response()->json(['data' => $catalog, 'msj' => 'Catálogo '.$status.'do exitosamente!'],200);
        }else{
            return response()->json(['data' => $catalog, 'msj' => 'No se pudo '.$status.'r el catálogo indicado'],200);
        }
    }
}
