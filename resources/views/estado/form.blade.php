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
            {{ Form::label('PAIS') }}
            <select id="ID_PAIS" name="pais" class="form-control" > 
                @foreach($paises as $pais)
                    <option value="{{$pais->ID_PAIS}}" selected>{{$pais->NOMBRE_PAIS}}</option>
                @endforeach   
            </select>
        </div>
    </div>
    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>