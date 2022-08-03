        <!-- DATOS PERSONA -->
        <div class="form-group">
            {{ Form::label('NOMBRE_PERSONA') }}
            {{ Form::text('NOMBRE_PERSONA', $persona->NOMBRE_PERSONA, ['class' => 'form-control' . ($errors->has('NOMBRE_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO_PERSONA') }}
            {{ Form::text('APELLIDO_PERSONA', $persona->APELLIDO_PERSONA, ['class' => 'form-control' . ($errors->has('APELLIDO_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'APELLIDO_PERSONA']) }}
            {!! $errors->first('APELLIDO_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FECHA DE NACIMIENTO') }}
            {{ Form::date('FECHA_NACIMINETO', $persona->FECHA_NACIMINETO, ['class' => 'form-control' . ($errors->has('FECHA_NACIMINETO') ? ' is-invalid' : ''), 'placeholder' => 'FECHA_NACIMINETO']) }}
            {!! $errors->first('FECHA_NACIMINETO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Preinscribir</button>
        </div>
                </div>
            </div>
        </div>


        