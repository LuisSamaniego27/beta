@extends('layouts.app')

@section('template_title')
    Barrios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Barrio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('barrios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>N°</th>
										<th>Nombre Barrio</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
 
                                    @foreach ($barrios as $barrio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $barrio->NOMBRE_BARRIO }}</td>
                                            <td>{{ $barrio->STATUS }}</td>

                                            <td>
                                                <form action="{{ route('barrios.destroy',$barrio->ID_BARRIO) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('barrios.show',$barrio->ID_BARRIO) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('barrios.edit',$barrio->ID_BARRIO) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" onclick="return confirm ('¿Estas seguro que desea borrar?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $barrios->links() !!}
            </div>
        </div>
    </div>
@endsection
