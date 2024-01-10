@extends('layouts.app')
@section('content')

<br>

<div>

    <h5 class="animated-text col-6 text-right ">NUEVO USUARIO</h1>
        <a href="{{ url('admin/users') }}" title="Back" style="position: relative; margin-left:10px"><button class="btn btn-info btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retornar</button></a>
        <br><br><br>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                    <div class="card">

                        <div class="card-body">
                          
              
                
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="35" required name="name" id="name" placeholder="Ingrese su nombre" value="{{ old('name') }}" autofocus oninput="handleInput(this)">

                                @if ($errors->has('name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="username" class="col-sm-2 col-form-label">Nombre de usuario: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" required maxlength="15" id="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="email" class="col-sm-2 col-form-label">Correo: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" required name="email" maxlength="20" placeholder="Ingrese su correo" value="{{ old('email') }}">
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
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" required id="password" placeholder="Contraseña" oninput="checkPasswordStrength()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                                            <input type="checkbox" id="showPassword"> Mostrar
                                        </button>
                                    </div>
                                </div>
                                <div id="password-strength-bar" class="password-strength-bar"></div>
                                <div id="password-strength-text" class="password-strength-text"></div>
                                @if ($errors->has('password'))
                                <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation" required id="password_confirmation" placeholder="Confirmar Contraseña" oninput="checkPasswordMatch()">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibilityConfirmation()">
                                            <input type="checkbox" id="showPasswordConfirmation"> Mostrar
                                        </button>
                                    </div>
                                </div>
                                <span id="password-match-error" class="error text-danger"></span>
                            </div>
                        </div>

                        <div></div><br>
                        <div class="row">


                            <label for="caja_id" requerid class="control-label  col-sm-2 col-form-label" class="col-sm-2 col-form-label form-select form-select-lg mb-3 pl-10" aria-label=".form-select-lg example">{{ 'Sucursal:' }}</label>

                            <div class="col-sm-4">
                                <select class="form-control  form-select " required data-live-search="true" name="sucursal_id" type="number" id="sucursal_id">

                                    @foreach ($sucursals as $a)
                                    <option value="{{ $a->id }}">{{ $a->nombre_sucursal }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="roles" class="col-sm-2 col-form-label">Roles:</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <ul class="list-group">
                                                @foreach ($roles as $id => $role)
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="role_{{ $id }}" name="roles[]" value="{{ $role }}" onchange="handleRoleSelection(this)" required>

                                                        <!-- Agregado el atributo 'required' en el input -->
                                                        <label class="form-check-label" for="role_{{ $id }}">
                                                            <span class="form-check-sign switch">
                                                                <span class="check"></span>
                                                            </span>
                                                            {{ $role }}
                                                        </label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
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
                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    </div>
                    <!--End footer-->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    function handleRoleSelection(checkbox) {
        if (checkbox.checked) {
            // Si se selecciona un rol, deshabilitar los demás
            disableOtherRoles(checkbox);
        } else {
            // Si se deselecciona, habilitar todos los roles
            enableAllRoles();
        }
    }

    function disableOtherRoles(selectedCheckbox) {
        var checkboxes = document.querySelectorAll('input[name="roles[]"]');
        checkboxes.forEach(function(checkbox) {
            if (checkbox !== selectedCheckbox) {
                checkbox.disabled = true;
            }
        });
    }

    function enableAllRoles() {
        var checkboxes = document.querySelectorAll('input[name="roles[]"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.disabled = false;
        });
    }
</script>

<script>
    function validateInput() {
        var input = document.getElementById('name');
        var inputValue = input.value;

        // Permitir solo letras y espacios
        inputValue = inputValue.replace(/[^a-zA-Z\s]/g, '');



        // Actualizar el valor del campo de entrada
        input.value = inputValue;
    }
</script>


<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var showPasswordCheckbox = document.getElementById('showPassword');

        // Cambiar el tipo de entrada de contraseña a texto y viceversa
        passwordInput.type = showPasswordCheckbox.checked ? 'text' : 'password';
    }

    function checkPasswordStrength() {
        var passwordInput = document.getElementById('password');
        var passwordStrengthBar = document.getElementById('password-strength-bar');
        var passwordStrengthText = document.getElementById('password-strength-text');

        // Evaluar la fortaleza de la contraseña
        var strength = 0;
        var regexList = [/[$@$!%*?&#]/, /[A-Z]/, /[0-9]/, /[a-z]/];

        for (var regex of regexList) {
            if (regex.test(passwordInput.value)) {
                strength++;
            }
        }

        // Mostrar la barra de fortaleza con colores y longitud proporcionales
        passwordStrengthBar.style.width = (strength * 25) + '%';

        if (strength === 0) {
            passwordStrengthBar.style.backgroundColor = '';
            passwordStrengthText.textContent = 'Ingrese la contraseña';
        } else if (strength <= 2) {
            passwordStrengthBar.style.backgroundColor = 'red';
            passwordStrengthText.textContent = 'Contraseña Insegura';
        } else if (strength <= 3) {
            passwordStrengthBar.style.backgroundColor = 'orange';
            passwordStrengthText.textContent = 'Contraseña Aceptable';
        } else {
            passwordStrengthBar.style.backgroundColor = 'green';
            passwordStrengthText.textContent = 'Contraseña Muy Fuerte';
        }
    }
</script>

<style>
    .password-strength-bar {
        height: 5px;
        margin-top: 5px;
        transition: width 0.3s ease;
    }

    .password-strength-text {
        margin-top: 5px;
        font-size: 14px;
        color: #555;
    }
</style>
<script>
    function checkPasswordMatch() {
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('password_confirmation');
        var passwordMatchError = document.getElementById('password-match-error');

        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordMatchError.textContent = 'Las contraseñas no coinciden';
        } else {
            passwordMatchError.textContent = '';
        }
    }
</script>
<script>
    function togglePasswordVisibilityConfirmation() {
        var passwordConfirmationInput = document.getElementById('password_confirmation');
        var showPasswordConfirmationCheckbox = document.getElementById('showPasswordConfirmation');

        // Cambiar el tipo de entrada de contraseña a texto y viceversa
        passwordConfirmationInput.type = showPasswordConfirmationCheckbox.checked ? 'text' : 'password';
    }
</script>

<script>
    function handleInput(input) {
        updateUsername(input);
        validateNameInput(input);
    }

    function updateUsername(input) {
        var usernameInput = document.getElementById('username');
        var name = input.value.trim();

        // Obtener las iniciales de cada palabra en el nombre
        var initials = name.split(' ').map(word => word[0].toUpperCase()).join('');

        // Limitar la longitud de las iniciales a 5 caracteres
        if (initials.length > 5) {
            initials = initials.substring(0, 5);
        }

        // Establecer el valor del campo de nombre de usuario
        usernameInput.value = initials + '_';
    }

    function validateNameInput(input) {
        // Expresión regular que solo permite letras y espacios
        var regex = /^[A-Za-z\s]+$/;

        // Obtener el valor del campo de entrada
        var inputValue = input.value;

        // Verificar si el valor cumple con la expresión regular
        if (!regex.test(inputValue)) {
            // Si no cumple, mostrar un mensaje de error
            // alert('Por favor, introduzca solo letras y espacios en el campo de nombre.');
            // Limpiar el valor no válido
            input.value = inputValue.replace(/[^A-Za-z\s]+/, '');
        }
    }
</script>