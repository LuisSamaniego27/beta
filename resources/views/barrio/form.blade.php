<div class="box box-info padding-1">
    <div class="box-body">
    
    <div class="form-group">
           <div class="col-auto">
                <select id="ID_CIUDAD" name="ID_CIUDAD" class="form-control" > 
                    @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->ID_CIUDAD}}" selected>{{$ciudad->NOMBRE_CIUDAD}}</option>
                    @endforeach   
                </select>
            </div>
        
        <div class="form-group">
            {{ Form::label('NOMBRE_BARRIO') }}
            {{ Form::text('NOMBRE_BARRIO', $barrio->NOMBRE_BARRIO, ['class' => 'form-control' . ($errors->has('NOMBRE_BARRIO') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_PAIS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $barrio->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
    <a href="{{ route('barrios.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </div>
</div>