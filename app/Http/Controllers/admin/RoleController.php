<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User; // Agrega esta línea para importar la clase User
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('acceso_roles'), 403);

        $roles = Role::where('estado', 1)->get();
        $roles2 = Role::where('estado', 0)->get();

        return view('roles.index', compact('roles','roles2'))->with('message3', 'Rol desactivado exitosamente.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     // abort_if(Gate::denies('role_create'), 403);

    //     $permissions = Permission::all()->pluck('name', 'id');
    //     // dd($permissions);
    //     return view('roles.create', compact('permissions'));
    // }
    public function create()
    {
        $permissions = [
            'Inicio' => [
                'acceso_estadisticas',
                'acceso_alertas',
       
            ],
            'Administracion' => [
                'acceso_administracion',
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
                // ... otros permisos relacionados con ventas
            ],
   
            'caja' => [
                'acceso_cajas',
                'crear_caja',
                'ver_movimientos',
                'imprimir_transacciones',
                'ver_caja',
                'editar_caja',
                'eliminar_caja',
                'acceso_mi_caja',
                'aperturar_caja',
                'corte_de_caja',
                'imprimir_reporte',
        
                // ... otros permisos relacionados con "Mi Caja"
            ],
            
         
           
            'Proveedores' => [
                'acceso_proveedores',
                'crear_proveedor',
                'ver_proveedor',
                'editar_proveedor',
                'eliminar_proveedor',
                'restaurar_proveedor',
                'acceso_kardex_proveedor',
                // ... otros permisos relacionados con proveedores
            ],

            'Clientes' => [
                'acceso_clientes',
                'crear_cliente',
                'ver_cliente',
                'editar_cliente',
                'eliminar_cliente',
                'restaurar_cliente',
                'acceso_kardex_cliente',
                // ... otros permisos relacionados con clientes
            ],
            'Productos' => [
                'acceso_productos',
                'crear_producto',
                'ver_producto',
                'editar_producto',
                
                'eliminar_producto',
                'restaurar_producto',
                'acceso_kardex_producto',
                'ver_precio_compra',
                // ... otros permisos relacionados con productos
            ],
            'Atributos' => [
                'acceso_atributos',
                'crear_atributo',
                'ver_atributo',
                'editar_atributo',
                'eliminar_atributo',
                'restaurar_atributo',
                // ... otros permisos relacionados con atributos
            ],
            'Lotes' => [
                'acceso_lotes',
                'eliminar_lote',
                'restaurar_lote',
                // ... otros permisos relacionados con lotes
            ],
            'Compras' => [
                'acceso_compras',
                'crear_compra',
                'ver_compra',
                'imprimir_reporte_compra',
                'eliminar_compra',
                'restaurar_compra',
                // ... otros permisos relacionados con compras
            ],
            'Ventas' => [
                'acceso_ventas',
                'crear_venta',
                'ver_venta',
                'imprimir_reporte_venta',
                'eliminar_venta',
                'restaurar_venta',
                // ... otros permisos relacionados con ventas
            ],
            'Notas de entrega' => [
                'acceso_notas_de_entrega',
                'crear_nota',
                'ver_nota',
                'imprimir_reporte_nota',
                'eliminar_nota',
                'restaurar_nota',
                // ... otros permisos relacionados con ventas
            ],
            'Cotizaciones' => [
                'acceso_cotizaciones',
                'crear_cotizacion',
                'ver_cotizacion',
                'editar_cotizacion',
                'imprimir_reporte_cotizacion',
                'eliminar_cotizacion',
                'restaurar_cotizacion',
                // ... otros permisos relacionados con cotizaciones
            ],
            'Reportes de ventas' => [
                'acceso_reporte_diario',
                'acceso_reporte_mensual',
                // ... otros permisos relacionados con reportes
            ],
            'Inventario' => [
                'acceso_inventario',
                'acceso_inventario_eliminados',
                'acceso_inventario_agotados',
                'ver_precio_compra',
                // ... otros permisos relacionados con inventario
            ],
            'Kardex general' => [
                'acceso_kardex',
                // ... otros permisos relacionados con el kardex de salidas
            ],
        
      
        ];

        return view('roles.create', compact('permissions'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crear un nuevo rol con los datos proporcionados en la solicitud
        $role = Role::create($request->only('name'));
    
        // Asignar permisos al rol utilizando syncPermissions
        $role->syncPermissions($request->input('permissions', []));
    
        // Redirigir a la vista de índice de roles con un mensaje de éxito
        return redirect()->route('roles.index')->with('message3', '');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // abort_if(Gate::denies('role_show'), 403);

        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Obtén todas las categorías de permisos
        $permissions = [
            'Inicio' => [
                'acceso_estadisticas',
                'acceso_alertas',
       
            ],
            'Administracion' => [
                'acceso_administracion',
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
                // ... otros permisos relacionados con ventas
            ],
   
            'caja' => [
                'acceso_cajas',
                'crear_caja',
                'ver_movimientos',
                'imprimir_transacciones',
                'ver_caja',
                'editar_caja',
                'eliminar_caja',
                'acceso_mi_caja',
                'aperturar_caja',
                'corte_de_caja',
                'imprimir_reporte',
        
                // ... otros permisos relacionados con "Mi Caja"
            ],
            
         
           
            'Proveedores' => [
                'acceso_proveedores',
                'crear_proveedor',
                'ver_proveedor',
                'editar_proveedor',
                'eliminar_proveedor',
                'restaurar_proveedor',
                'acceso_kardex_proveedor',
                // ... otros permisos relacionados con proveedores
            ],

            'Clientes' => [
                'acceso_clientes',
                'crear_cliente',
                'ver_cliente',
                'editar_cliente',
                'eliminar_cliente',
                'restaurar_cliente',
                'acceso_kardex_cliente',
                // ... otros permisos relacionados con clientes
            ],
            'Productos' => [
                'acceso_productos',
                'crear_producto',
                'ver_producto',
                'editar_producto',
                
                'eliminar_producto',
                'restaurar_producto',
                'acceso_kardex_producto',
                'ver_precio_compra',
                // ... otros permisos relacionados con productos
            ],
            'Atributos' => [
                'acceso_atributos',
                'crear_atributo',
                'ver_atributo',
                'editar_atributo',
                'eliminar_atributo',
                'restaurar_atributo',
                // ... otros permisos relacionados con atributos
            ],
            'Lotes' => [
                'acceso_lotes',
                'eliminar_lote',
                'restaurar_lote',
                // ... otros permisos relacionados con lotes
            ],
            'Compras' => [
                'acceso_compras',
                'crear_compra',
                'ver_compra',
                'imprimir_reporte_compra',
                'eliminar_compra',
                'restaurar_compra',
                // ... otros permisos relacionados con compras
            ],
            'Ventas' => [
                'acceso_ventas',
                'crear_venta',
                'ver_venta',
                'imprimir_reporte_venta',
                'eliminar_venta',
                'restaurar_venta',
                // ... otros permisos relacionados con ventas
            ],
            'Notas de entrega' => [
                'acceso_notas_de_entrega',
                'crear_nota',
                'ver_nota',
                'imprimir_reporte_nota',
                'eliminar_nota',
                'restaurar_nota',
                // ... otros permisos relacionados con ventas
            ],
            'Cotizaciones' => [
                'acceso_cotizaciones',
                'crear_cotizacion',
                'ver_cotizacion',
            
                'imprimir_reporte_cotizacion',
                'eliminar_cotizacion',
                'restaurar_cotizacion',
                // ... otros permisos relacionados con cotizaciones
            ],
            'Reportes de ventas' => [
                'acceso_reporte_diario',
                'acceso_reporte_mensual',
                // ... otros permisos relacionados con reportes
            ],
            'Inventario' => [
                'acceso_inventario',
                'acceso_inventario_eliminados',
                'acceso_inventario_agotados',
                'ver_precio_compra',
                // ... otros permisos relacionados con inventario
            ],
            'Kardex general' => [
                'acceso_kardex',
                // ... otros permisos relacionados con el kardex de salidas
            ],
        
      
        ];
    
        // Carga los permisos asociados al rol
        $role->load('permissions');
    
        return view('roles.edit', compact('role', 'permissions'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));

        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index')->with('message4', 'Rol desactivado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Verifica si algún usuario tiene asignado este rol
        $usersWithRole = User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role->name);
        })->count();
    
        if ($usersWithRole > 0) {
            return redirect()->route('roles.index')->with('message1', 'No puedes desactivar un rol que tiene usuarios asignados.');
        }
    
        // Cambiar el estado a 0 en lugar de eliminar
        $role->update(['estado' => 0]);
    
        return redirect()->route('roles.index')->with('message2', 'Rol desactivado exitosamente.');
    }
    
    public function reingresar($id)
{
    // Buscar el rol por ID
    $role = Role::findOrFail($id);
    
    // Verificar si el rol ya está activo antes de actualizar el estado
    if ($role->estado == 1) {
        return redirect()->route('roles.index')->with('warning', 'El rol ya está activo.');
    }

    // Actualizar el estado a 1 para "activar" el rol
    $role->update(['estado' => 1]);

    return redirect()->route('roles.index')->with('success', 'Rol reingresado exitosamente.');
}

    
}
