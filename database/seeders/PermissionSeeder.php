<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'acceso_estadisticas',
            'acceso_alertas',
            'acceso_sucursales',
            'crear_sucursal',
            'ver_sucursal',
            'editar_sucursal',
            'eliminar_sucursal',
            'restaurar_sucursal',
            'cambiar_de_sucursal',
            'acceso_informacion_empresa',
            'acceso_editar_informacion_empresa',
            'acceso_roles',
            'crear_rol',
            'ver_rol',
            'editar_rol',
            'eliminar_rol',
            'restaurar_rol',
            'acceso_usuarios',
            'crear_usuario',
            'ver_usuario',
            'editar_usuario',
            'eliminar_usuario',
            'restaurar_usuario',
            'acceso_cajas',
            'ver_caja',
            'crear_caja',
            'ver_movimientos',
            'imprimir_transacciones',
            'editar_caja',
            'eliminar_caja',
            'acceso_mi_caja',
            'aperturar_caja',
            'corte_de_caja',
            'imprimir_reporte',
            'acceso_proveedores',
            'crear_proveedor',
            'ver_proveedor',
            'editar_proveedor',
            'eliminar_proveedor',
            'restaurar_proveedor',
            'acceso_kardex_proveedor',
            
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
