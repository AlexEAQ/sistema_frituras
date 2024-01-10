@extends('layouts.app')
@section('content')
<br />
<h1 class="animated-text">Insumos</h1>
<br /><br />
<div class="content" style="margin-top: 5%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 text-right">
                            <a href="{{ url('/admin/insumos/create') }}" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus-square"></i> Nuevo</a>
                        </div>

                        <div class="tab-content">
                            <div class="table-responsive-xl">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Estado</th>
                                            <th>Nombre</th>
                                            <th>Medida</th>
                                            <th>Stock</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($insumos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->estado == 1)
                                                <span class="badge badge-success">Activo</span>
                                                @else
                                                <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->medida }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td class="td-actions text-right">
                                                @if($item->estado == 1)
                                                <a href="{{ url('/admin/insumos/' . $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver detalles"> <i class="far fa-eye"></i></a>
                                                <a href="{{ url('/admin/insumos/' . $item->id . '/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ url('/admin/insumos' . '/' . $item->id) }}" method="POST" style="display: inline-block;" class="form-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-elinar" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" rel="tooltip">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <a href="{{ route('insumos.reingresar', $item->id) }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Restaurar">
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
        <script>
            $(document).ready(function() {
                $(".table").DataTable({
                    lengthMenu: [10, 25, 50],
                    order: [

                        [1, "asc"],
                    ],
                    language: {
                        decimal: "",
                        emptyTable: "No hay datos",
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        infoEmpty: "Mostrando 0 a 0 de 0 registros",
                        infoFiltered: "(Filtro de _MAX_ total registros)",
                        infoPostFix: "",
                        thousands: ",",
                        lengthMenu: "Mostrar _MENU_ registros",
                        loadingRecords: "Cargando...",
                        processing: "Procesando...",
                        search: "Buscar:",
                        zeroRecords: "No se encontraron coincidencias",

                        paginate: {
                            first: "Primero",
                            last: "Ultimo",
                            next: "Próximo",
                            previous: "Anterior",
                        },
                        aria: {
                            sortAscending: ": Activar orden de columna ascendente",
                            sortDescending: ": Activar orden de columna desendente",
                        },
                    },

                });
            });
        </script>
        @endsection