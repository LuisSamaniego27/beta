@extends('layouts.app')

@section('template_title')
    Preinscripcion
@endsection

@section('content')

  <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de alumnos preinscriptos sin documentos entregados') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('preinscripciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Preinscribir') }}
                                </a>
                            </div>

                            
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										
										<th>PERSONA</th>
                                        <th>ETAPA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preinscripciones as $preinscripcion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											
											<td>{{ $preinscripcion->ID_PER_PERSONA }}</td>
                                            <td>{{ $preinscripcion->ID_ETAPA }}</td>

                                            <td>
                                                <form action="{{ route('preinscripciones.destroy',$preinscripcion->ID_PREINSCRIPCION) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('preinscripciones.show',$preinscripcion->ID_PREINSCRIPCION) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('preinscripciones.edit',$preinscripcion->ID_PREINSCRIPCION) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('preinscripciones.show',$preinscripcion->ID_PREINSCRIPCION) }}"><i class="fa fa-fw fa-eye"></i> Inscribir</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $preinscripciones->links() !!}    

            </div>
            
        </div>
    </div>
    
@endsection


 