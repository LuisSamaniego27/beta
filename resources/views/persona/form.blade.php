        <!-- DATOS PERSONA -->
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
            {{ Form::text('SEXO', $persona->SEXO, ['class' => 'form-control' . ($errors->has('SEXO') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione su sexo']) }}
            {!! $errors->first('SEXO', '<div class="invalid-feedback">:message</div>') !!}
        </div><!-- HACER UNCOMBO BOX PARA SEXO -->

        <div class="form-group">
            {{ Form::label('FECHA DE NACIMIENTO') }}
            {{ Form::date('FECHA_NACIMINETO', $persona->FECHA_NACIMINETO, ['class' => 'form-control' . ($errors->has('FECHA_NACIMINETO') ? ' is-invalid' : ''), 'placeholder' => 'FECHA_NACIMINETO']) }}
            {!! $errors->first('FECHA_NACIMINETO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('CIUDAD') }}
            {{ Form::text('ID_CIUDAD', $persona->ID_CIUDAD, ['class' => 'form-control' . ($errors->has('ID_CIUDAD') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad de residencia']) }}
            {!! $errors->first('ID_CIUDAD', '<div class="invalid-feedback">:message</div>') !!}
        </div><!-- HACER UNCOMBO BOX PARA CIUDAD -->
        
        
        <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Preinscribir</button>
        </div>
                </div>
            </div>
        </div>


        