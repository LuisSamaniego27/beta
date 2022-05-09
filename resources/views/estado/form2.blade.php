<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('NOMBRE_ESTADO') }}
            {{ Form::text('NOMBRE_ESTADO', $estado->NOMBRE_ESTADO, ['class' => 'form-control' . ($errors->has('NOMBRE_ESTADO') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_ESTADO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $estado->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('ID_PAIS') }}
           <!--  {{ Form::select('ID_PAIS', $paises, null, ['class' => 'form-control']) }} -->

           <div class="col-auto">
                <select id="ID_PAIS" name="ID_PAIS" class="form-control" > 
                    @foreach($paises as $pais)
                        
                            @if ($pais->ID_PAIS == $estado->ID_PAIS)
                                <option value="{{$pais->ID_PAIS}}" selected>{{$pais->NOMBRE_PAIS}}</option>
                                @break
                            @else
                                <option value="{{$pais->ID_PAIS}}" selected>{{$pais->NOMBRE_PAIS}}</option>
                            @endif
                          

                        
                    @endforeach   
                </select>
            </div>
            
        </div>
    </div>

    <div class="box-footer mt20">
        <a href="{{ route('estados.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>

    </div>
</div>



