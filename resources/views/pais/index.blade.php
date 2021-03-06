@extends('layouts.app')

@section('template_title')
    Pais
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pais') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('paises.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($paises as $pais)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pais->NOMBRE_PAIS }}</td>
											<td>{{ $pais->STATUS }}</td>

                                            <td>
                                                <form action="{{ route('paises.destroy',$pais->ID_PAIS) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paises.show',$pais->ID_PAIS) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paises.edit',$pais->ID_PAIS) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $paises->links() !!}
            </div>
        </div>
    </div>
@endsection
