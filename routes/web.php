<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\InsumosController;
use App\Http\Controllers\admin\ProveedorsController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PermissionController;
use App\Models\Proveedor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('admin/users/{user}/deleted', [UserController::class, 'reingresar'])->name('users.reingresar');
    Route::resource('admin/permissions', PermissionController::class);
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/insumos', InsumosController::class);
    Route::get('admin/roles/{role}/reingresar', [RoleController::class, 'reingresar'])->name('roles.reingresar');
    Route::get('admin/insumos/{insumo}/reingresar', [InsumosController::class, 'reingresar'])->name('proveedors.reingresar');
    Route::resource('admin/proveedors', ProveedorsController::class);

    Route::get('admin/proveedors/{proveedor}/reingresar', [ProveedorsController::class, 'reingresar'])->name('proveedors.reingresar');

 
 


});
