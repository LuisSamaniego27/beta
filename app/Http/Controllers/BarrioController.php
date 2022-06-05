<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarrioController extends Controller
{
    
    public function index()
    {
        $barrios = Barrio::paginate();

        return view('barrio.index', compact('barrios'))
            ->with('i', (request()->input('page', 1) - 1) * $barrios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $barrio = barrio::find($id);
        $ciudades = Ciudad::all();

        return view('barrio.show', compact('barrio', 'ciudades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barrio = Barrio::find($id);
        $ciudades = Ciudad::all();

        return view('barrio.edit', compact('barrio', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Barrio::$rules);
        $barrio = Barrio::find($id);
        $barrio->ID_ESTADO = $request->get('ID_ESTADO');
        $barrio->NOMBRE_CIUDAD = $request->get('NOMBRE_CIUDAD');
        $barrio->STATUS = $request->get('STATUS');
        $barrio->save();

        return redirect()->route('barrio.index')
            ->with('success', 'País actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barrio  $barrio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barrio = Barrio::find($id)->delete();

        return redirect()->route('barrio.index')
            ->with('success', 'Barrio eliminado con exito');
    }
}
