@extends('layouts.app')
@section('content')
@if (session()->has('message1'))
<script>
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'No puede realizar esta accion ya que hay usuarios activos utilzando este rol',
    showConfirmButton: true,
    timer: 6000
  });
</script>
@endif
@if (session()->has('message2'))
<script>
  Swal.fire({

    position: 'center',
    icon: "success",
    title: 'Rol desactivado correctamente',
  });
</script>
@endif
@if (session()->has('message3'))
<script>
  Swal.fire({
    position: 'center',
    icon: "success",
    title: 'Rol creado con exito',
  });
</script>
@endif
@if (session()->has('message4'))
<script>
  Swal.fire({
    position: 'center',
    icon: "success",
    title: 'Rol actualizado con exito',
  });
</script>
@endif
<br>
<h1 class="animated-text">ROLES</h1>
<br><br>
<div class="content" style="margin-top:5%">

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">

        <div class="card">


          <div class="card-body">
            <div class="col-12 text-right">
              @can('crear_rol')
              <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus-square"></i> Nuevo Rol</a>
              @endcan
            </div>




            <div class="tab-content">
              <div class="table-responsive-xl">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>

                      <th> # </th>
                      <th>Estado</th>
                      <th> Nombre del rol</th>
                      <th class="text-right"> OPCIONES </th>
                    </tr>
                  </thead>
                  <tbody style="font-size: 14px">
                    @foreach ($roles as $role)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        @if($role->estado == 1)
                        <span class="badge badge-success">Activo</span>
                        @else
                        <span class="badge badge-danger">Inactivo</span>
                        @endif
                      </td>

                      <td>{{ $role->name }}</td>

                      <td class="td-actions text-right">
                      @if($role->estado == 1)
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver detalles"> <i class="far fa-eye"></i></a>

                        <a href="{{ route('roles.edit', $role->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"> <i class="fas fa-edit"></i></a>

                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;" class="form-eliminar">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-elinar" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" rel="tooltip">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                        @else
                        <a href="{{ route('roles.reingresar', $user->id) }}" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Restaurar">
            <i class="fas fa-undo"></i>
          </a>
        @endif


              </div>
            </div>
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
</div>
</div>
</div>








<script>
  $(document).ready(function() {
    $(".table").DataTable({
      lengthMenu: [10, 25, 50],
      order: [
        [0, "desc"],
        [1, "desc"],
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