@extends('layouts.app') 
@section('content')
<br />
<h1 class="animated-text">Proveedors</h1>
<br /><br />
<div class="content" style="margin-top: 5%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 text-right">
                            <a href="{{ url('/admin/proveedors/create') }}"
                                class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus-square"></i> Nuevo</a>
                        </div>

                        <div class="tab-content">
                            <div class="table-responsive-xl">
                              <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Estado</th>
                                            <th>Nombre</th><th>Razon Social</th><th>Direccion</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($proveedors as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
        @if($item->estado == 1)
        <span class="badge badge-success">Activo</span>
        @else
        <span class="badge badge-danger">Inactivo</span>
        @endif
      </td>

                                            <td>{{ $item->nombre }}</td><td>{{ $item->razon_social }}</td><td>{{ $item->direccion }}</td>
                                            <td class="td-actions text-right">
                                            @if($item->estado == 1)
                                                <a href="{{ url('/admin/proveedors/' . $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver detalles"> <i class="far fa-eye"></i></a>
                                                <a href="{{ url('/admin/proveedors/' . $item->id . '/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ url('/admin/proveedors' . '/' . $item->id) }}" method="POST" style="display: inline-block;" class="form-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-elinar" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" rel="tooltip">
                                                      <i class="fas fa-trash"></i>
                                                    </button>
                                                  </form>
             @else
          <a href="{{ route('/admin/reingresar/', $item->id ) }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Restaurar">
            <i class="fas fa-undo"></i>
          </a>
        @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    </div>
</div>