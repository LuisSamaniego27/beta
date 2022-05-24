@extends('layouts.app')

@section('template_title')
    {{ $barrios->name ?? 'Show barrio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Barrios</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('barrios.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $barrio->NOMBRE_BARRIO }}
                        </div>

                        <div class="card-body">
                    
                        <div class="form-group">
                            
                         @foreach($ciudades as $ciudad)
                        
                            @if ($ciudad->ID_CIUDAD == $barrio->ID_CIUDAD)
                                <strong>Ciudad:</strong>
                                {{ $ciudad->NOMBRE_CIUDAD }}
                                @break
                            @endif
                        
                        @endforeach   
                        </div>
                       
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $barrio->STATUS }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
