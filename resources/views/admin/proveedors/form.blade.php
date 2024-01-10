<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($proveedor->nombre) ? $proveedor->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
    <label for="razon_social" class="control-label">{{ 'Razon Social' }}</label>
    <input class="form-control" name="razon_social" type="text" id="razon_social" value="{{ isset($proveedor->razon_social) ? $proveedor->razon_social : ''}}" >
    {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($proveedor->direccion) ? $proveedor->direccion : ''}}" >
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('celular') ? 'has-error' : ''}}">
    <label for="celular" class="control-label">{{ 'Celular' }}</label>
    <input class="form-control" name="celular" type="number" id="celular" value="{{ isset($proveedor->celular) ? $proveedor->celular : ''}}" >
    {!! $errors->first('celular', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
