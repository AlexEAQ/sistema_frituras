<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
      
        $insumos = Insumo::get();
        return view('admin.insumos.index', compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.insumos.create');
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
        
        Insumo::create($requestData);

        return redirect('admin/insumos')->with('flash_message', 'Insumo added!');
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
        $insumo = Insumo::findOrFail($id);

        return view('admin.insumos.show', compact('insumo'));
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
        $insumo = Insumo::findOrFail($id);

        return view('admin.insumos.edit', compact('insumo'));
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
        
        $insumo = Insumo::findOrFail($id);
        $insumo->update($requestData);

        return redirect('admin/insumos')->with('flash_message', 'Insumo updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Insumo $id)
    {
        Insumo::where('id', $id)->update(['estado' => '0']);
        return redirect('admin/insumos')->with('flash_message', 'Insumo deleted!');
    }
}
