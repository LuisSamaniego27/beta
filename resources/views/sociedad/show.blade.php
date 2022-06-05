@extends('layouts.app')

@section('template_title')
    {{ $paises->name ?? 'Show Pais' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pais</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paises.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $pais->NOMBRE_PAIS }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pais->STATUS }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
