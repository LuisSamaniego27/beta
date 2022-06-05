@extends('layouts.app')

@section('template_title')
    Modificar Barrios
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Barrios</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('barrios.update', $barrio->ID_BARRIO) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('barrio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection