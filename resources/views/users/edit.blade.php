@extends('layouts.app')
@section('content')
<br>
<div>

    <h5 class="animated-text col-6 text-right ">EDITAR USUARIO</h1>
        <a href="{{ url('admin/users') }}" title="Back" style="position: relative; margin-left:10px"><button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
        <br><br><br>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">

                        <div class="card-body">
                            {{-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif --}}
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                @if ($errors->has('name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="username" class="col-sm-2 col-form-label">Nombre de usuario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('name', $user->username) }}">
                                @if ($errors->has('username'))
                                <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="email" class="col-sm-2 col-form-label">Correo: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('name', $user->email) }}">
                                @if ($errors->has('email'))
                                <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        {{-- <span class="badge badge-warning">Recordatorio: No puede asignarle una caja que ya este en uso, verifique primero las
                    cajas que no tenga un usuario relacionado</span> --}}
                        <div class="row">
                            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" {{ old('name', $user->password) }} placeholder="Contraseña">
                                @if ($errors->has('password'))
                                <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div></div><br>
                      
                      
                        <div class="row">
                            <label for="roles" class="col-sm-2 col-form-label">Roles:</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <table class="table">
                                                <tbody>
                                                    @foreach ($roles as $id => $role)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $id }}" @if (in_array($id, $userRoles)) checked @endif>
                                                                    <span class="form-check-sign">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $role }}
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

                        <div class="row">
                            <label for="roles" class="col-sm-2 col-form-label">Foto de perfil:</label>
                            <div class="col-sm-10">

                                <input type="file" class="fileInput" name="imagen" type="file" id="imagen" value="{{ isset($user->imagen) ? $user->imagen : '' }}">
                            </div>
                        </div>
                        <br>
                    </div>



                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                    </div>
                    <!--End footer-->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection