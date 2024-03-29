<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('NOMBRE_PAIS') }}
            {{ Form::text('NOMBRE_PAIS', $pais->NOMBRE_PAIS, ['class' => 'form-control' . ($errors->has('NOMBRE_PAIS') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_PAIS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $pais->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a href="{{ route('paises.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>

    </div>
</div>