
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($insumo->nombre) ? $insumo->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medida') ? 'has-error' : ''}}">
    <label for="medida" class="control-label">{{ 'Medida' }}</label>
    <input class="form-control" name="medida" type="text" id="medida" value="{{ isset($insumo->medida) ? $insumo->medida : ''}}" >
    {!! $errors->first('medida', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    <label for="stock" class="control-label">{{ 'Stock' }}</label>
    <input class="form-control" name="stock" type="number" id="stock" value="{{ isset($insumo->stock) ? $insumo->stock : ''}}" >
    {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
