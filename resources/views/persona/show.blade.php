@extends('layouts.app')

@section('template_title')
    {{ $personas->name ?? 'Show Persona' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personas.index') }}"> Back</a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $persona->NOMBRE_PERSONA }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $persona->STATUS }}
                        </div>


                    </div>

                    <div class="card-body">
                        <a class="btn btn-sm btn-primary " href="{{ route('preinscripciones.create',$persona->ID_PERSONA) }}"><i class="fa fa-fw fa-eye"></i> Completar preinscripcion</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
