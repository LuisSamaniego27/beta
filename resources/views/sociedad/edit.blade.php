@extends('layouts.app')

@section('template_title')
    Update Sociedad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Sociedad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sociedades.update', $sociedad->ID_SOCIEDAD) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('sociedad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
