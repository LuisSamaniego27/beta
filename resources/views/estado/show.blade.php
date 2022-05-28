@extends('layouts.app')

@section('template_title')
    {{ $estados->name ?? 'Show Estado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estados.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estado->NOMBRE_ESTADO }}
                        </div>
                        <div class="form-group">
                            
                         @foreach($paises as $pais)
                        
                            @if ($pais->ID_PAIS == $estado->ID_PAIS)
                                <strong>Pais:</strong>
                                {{ $pais->NOMBRE_PAIS }}
                                @break
                            @endif
                        
                        @endforeach   
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $estado->STATUS }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
