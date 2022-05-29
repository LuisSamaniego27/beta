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

                            <div class="float-right">
                                <a href="{{ route('preinscripciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Inscribir') }}
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
                                        
										<th>Cedula</th>
										<th>Nombre</th>
                                        <th>Apellido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preinscripciones as $preinscripcion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $preinscripcion->DOCUMENTO }}</td>
											<td>{{ $preinscripcion->NOMBRE_HIJO }}</td>
                                            <td>{{ $preinscripcion->APELLIDO_HIJO }}</td>

                                            <td>
                                                <form action="{{ route('preinscripciones.destroy',$preinscripcion->DOCUMENTO) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('preinscripciones.show',$preinscripcion->DOCUMENTO) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('preinscripciones.edit',$preinscripcion->DOCUMENTO) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('preinscripciones.show',$preinscripcion->DOCUMENTO) }}"><i class="fa fa-fw fa-eye"></i> Inscribir</a>
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


 