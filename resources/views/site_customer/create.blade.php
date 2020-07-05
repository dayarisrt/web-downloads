@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="w-100">
                <h1 class="text-center">Crea tu sitio</h1>
            </div>
        </div>
        <site-customer-create-component :catalogs='{{$catalogs}}' :sites='{{$sites}}'></site-customer-create-component>
    </div>
@endsection