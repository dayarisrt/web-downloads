@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <div>
                        <a href="{{route('catalog.create')}}" class="btn btn-primary">Crear un nuevo Catálogo</a>
                    </div><br>
                    <div>
                        <a href="{{route('site.create')}}" class="btn btn-primary">Crear un nuevo Sitio</a>
                    </div><br>
                    <div>
                        <a href="{{route('sites-customers.create')}}" class="btn btn-primary">Crear un nuevo Sitio a la medida</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
