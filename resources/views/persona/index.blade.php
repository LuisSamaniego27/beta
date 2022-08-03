@extends('layouts.app')

@section('template_title')
    Ingresar datos personales
@endsection

@section('content')

  <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Cedula</th>
										<th>Nombre</th>
                                        <th>Apellido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $persona->DOCUMENTO}}</td>
											<td>{{ $persona->NOMBRE_PERSONA }}</td>
                                            <td>{{ $persona->APELLIDO_PERSONA }}</td>

                                            <td>
                                                <form action="{{ route('personas.destroy',$persona->ID_PERSONA) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('personas.show',$persona->ID_PERSONA) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('personas.edit',$persona->ID_PERSONA) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $personas->links() !!}    

            </div>
            
        </div>
    </div>



    
      
@endsection


 