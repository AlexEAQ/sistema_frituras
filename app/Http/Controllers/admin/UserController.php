<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Caja;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::get();
 
        return view('users.index', compact('users'));
    }
    public function create()
    {
        $sucursals = Sucursal::All();
        // abort_if(Gate::denies('crear_usuario'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles', 'sucursals'));
    }

    public function store(UserCreateRequest $request)
    {
       
        try {
            // Obtener datos del formulario
            $requestData = $request->only('name', 'username', 'email', 'sucursal_id');
    
            // Manejar el archivo de imagen si está presente en la solicitud
            if ($request->hasFile('imagen')) {
                $requestData['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }
    
            // Crear el usuario en la base de datos, incluyendo la contraseña encriptada
            $user = User::create($requestData + [
                'password' => bcrypt($request->input('password')),
            ]);
    
            // Obtener los roles seleccionados en el formulario
            $roles = $request->input('roles', []);
    
            // Asignar los roles al usuario utilizando assignRole para un solo rol o syncRoles para múltiples roles
            foreach ($roles as $role) {
                $user->assignRole($role);
            }
            
            // Opción para asignar múltiples roles utilizando syncRoles
            // $user->syncRoles($roles);
    
            // Redirigir a la página de detalles del usuario con un mensaje de éxito
            return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado correctamente');
        } catch (\Exception $e) {
            // Manejar la excepción
            return redirect()->route('users.index')->with('error', 'Error al crear el usuario: ' . $e->getMessage());
        }
    }

    public function show(User $user)
    {
        // abort_if(Gate::denies('user_show'), 403);
        // $user = User::findOrFail($id);
        // dd($user);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // $cajas = Caja::All();
        // $sucursals = Sucursal::All();
        $sucursalActual = $user->sucursal;
        // abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit', compact('user', 'roles', 'sucursalActual', 'userRoles'));
    }

    public function update(UserEditRequest $request, User $user)
    {
        // dd($request); // Puedes usar dd para debuggear y ver la estructura del request
        $data = $request->only('name', 'username', 'email');

        $password = $request->input('password');
        if ($password) {
            $data['password'] = bcrypt($password);
        }

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
    
        // abort_if(Gate::denies('user_destroy'), 403);

        // if (auth()->user()->id == $user->id) {
        //     return redirect()->route('users.index');
        // }
        // dd("asd");
        // Cambiar el estado en lugar de eliminar
        User::where('id', $user->id)->update(['estado' => '0']);

        return back()->with('success', 'Usuario desactivado correctamente');
    }

    public function reingresar($id)
    {
   
        User::where('id', $id)->update(['estado' => '1']);

        return redirect()->route('users.index')->with('success', 'Usuario reactivado correctamente.');
    }
}
