<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
$caja = Caja::get();

        return view('admin.caja.index', compact('caja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.caja.create');
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
        
        Caja::create($requestData);

        return redirect('admin/caja')->with('flash_message', 'Caja added!');
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
        $caja = Caja::findOrFail($id);

        return view('admin.caja.show', compact('caja'));
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
        $caja = Caja::findOrFail($id);

        return view('admin.caja.edit', compact('caja'));
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
        
        $caja = Caja::findOrFail($id);
        $caja->update($requestData);

        return redirect('admin/caja')->with('flash_message', 'Caja updated!');
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
       Caja::where('id', $id)->update(['estado' => '0']);

        return redirect('admin/caja')->with('flash_message', 'Caja deleted!');
    }

   public function reingresar($id)
    {
   
       Caja::where('id', $id)->update(['estado' => '1']);
        return redirect('admin/caja')->with('flash_message', 'Caja Reactivado!');
    }

}
