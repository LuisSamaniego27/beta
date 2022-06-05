@extends('layouts.app')

@section('template_title')
    Sociedad
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sociedad') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sociedades.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        
										<th>Nombre</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sociedades as $sociedad)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sociedad->NOMBRE_SOCIEDAD }}</td>
											<td>{{ $sociedad->STATUS }}</td>

                                            <td>
                                                <form action="{{ route('sociedades.destroy',$sociedad->ID_SOCIEDAD) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sociedades.show',$sociedad->ID_SOCIEDAD) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sociedades.edit',$sociedad->ID_SOCIEDAD) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $sociedades->links() !!}
            </div>
        </div>
    </div>
@endsection
