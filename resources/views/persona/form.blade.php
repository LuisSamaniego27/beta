<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('CEDULA') }}
            {{ Form::text('DOCUMENTO', $persona->DOCUMENTO, ['class' => 'form-control' . ($errors->has('DOCUMENTO') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su número de cédula']) }}
            {!! $errors->first('DOCUMENTO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('NOMBRE_PERSONA') }}
            {{ Form::text('NOMBRE_PERSONA', $persona->NOMBRE_PERSONA, ['class' => 'form-control' . ($errors->has('NOMBRE_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese sus nombres']) }}
            {!! $errors->first('NOMBRE_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('APELLIDO_PERSONA') }}
            {{ Form::text('APELLIDO_PERSONA', $persona->APELLIDO_PERSONA, ['class' => 'form-control' . ($errors->has('APELLIDO_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese sus apellidos']) }}
            {!! $errors->first('APELLIDO_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('SEXO') }}
            <select id="SEXO" name="SEXO" class="form-control" > 
                    <option value="MASCULINO" selected>MASCULINO</option>    
                    <option value="FEMENINO" selected>FEMENINO</option>  
                </select>
        </div>

        <div class="form-group">
            {{ Form::label('FECHA DE NACIMIENTO') }}
            {{ Form::date('FECHA_NACIMINETO', $persona->FECHA_NACIMINETO, ['class' => 'form-control' . ($errors->has('FECHA_NACIMINETO') ? ' is-invalid' : ''), 'placeholder' => 'FECHA_NACIMINETO']) }}
            {!! $errors->first('FECHA_NACIMINETO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('CIUDAD DE RESIDENCIA') }}
            <div class="col-auto">
                <select id="ID_CIUDAD" name="ID_CIUDAD" class="form-control" > 
                    @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->ID_CIUDAD}}" selected>{{$ciudad->NOMBRE_CIUDAD}}</option>
                    @endforeach   
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $persona->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        
    <div class="box-footer mt20">
        <a href="{{ route('personas.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>            
    </div>

</div>

        
    


        