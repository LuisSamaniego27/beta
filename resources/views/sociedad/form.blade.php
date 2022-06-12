<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('NOMBRE_SOCIEDAD') }}
            {{ Form::text('NOMBRE_SOCIEDAD', $sociedad->NOMBRE_SOCIEDAD, ['class' => 'form-control' . ($errors->has('NOMBRE_SOCIEDAD') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_SOCIEDAD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $sociedad->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DIRECCION') }}
            {{ Form::text('DIRECCION', $sociedad->DIRECCION, ['class' => 'form-control' . ($errors->has('DIRECCION') ? ' is-invalid' : ''), 'placeholder' => 'DIRECCION']) }}
            {!! $errors->first('DIRECCION', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('LATITUD') }}
            {{ Form::text('LATITUD', $sociedad->LATITUD, ['class' => 'form-control' . ($errors->has('LATITUD') ? ' is-invalid' : ''), 'placeholder' => 'LATITUD']) }}
            {!! $errors->first('LATITUD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LONGITUD') }}
            {{ Form::text('LONGITUD', $sociedad->LONGITUD, ['class' => 'form-control' . ($errors->has('LONGITUD') ? ' is-invalid' : ''), 'placeholder' => 'LONGITUD']) }}
            {!! $errors->first('LONGITUD', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
    <a href="{{ route('sociedades.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </div>
</div>