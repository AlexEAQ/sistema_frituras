<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
$proveedors = Proveedor::get();

        return view('admin.proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.proveedors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Proveedor::create($requestData);

        return redirect('admin/proveedors')->with('flash_message', 'Proveedor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedors.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('admin.proveedors.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($requestData);

        return redirect('admin/proveedors')->with('flash_message', 'Proveedor updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       Proveedor::where('id', $id)->update(['estado' => '0']);

        return redirect('admin/proveedors')->with('flash_message', 'Proveedor deleted!');
    }

   public function reingresar($id)
    {
   
       Proveedor::where('id', $id)->update(['estado' => '1']);
        return redirect('admin/proveedors')->with('flash_message', 'Proveedor Reactivado!');
    }

}
