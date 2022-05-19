<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Estado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class EstadoController extends Controller
{
    public function index()
    {
        
        $estados = Estado::orderBy('DATETIME', 'desc')->paginate();
       

        return view('estado.index', compact('estados'))
            ->with('i', (request()->input('page', 1) - 1) * $estados->perPage());
    }

    public function create()
    {
        $estado = new Estado();
        $paises = Pais::all();

        return view('estado.create',  compact('estado', 'paises'));
    }

    public function store(Request $request)
    {
        request()->validate(Estado::$rules);

        //$estado = Estado::create($request->all());
        $estado = new Estado();
        $estado->ID_PAIS = $request->get('ID_PAIS');
        $estado->NOMBRE_ESTADO = $request->get('NOMBRE_ESTADO');
        $estado->STATUS = $request->get('STATUS');
        //$date = Carbon::now();
        $date = new DateTime("now");
        $date = $date->format('Ymd H:i:s');
        $estado->DATETIME = $date;
        $estado->save();

        return redirect()->route('estados.index')
            ->with('success', 'Estado creado exitosamente');
            
    }

    public function show($id)
    {
        $estado = estado::find($id);
        $paises = Pais::all();

        return view('estado.show', compact('estado', 'paises'));
    }

    public function edit($id)
    {

        $estado = Estado::find($id);
        //$paises = Pais::all()->pluck('NOMBRE_PAIS', 'ID_PAIS');
        $paises = Pais::all();

        return view('estado.edit', compact('estado', 'paises'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate(Estado::$rules);

        //$estado->update($request->all());

        $estado = Estado::find($id);
        $estado->ID_PAIS = $request->get('ID_PAIS');
        $estado->NOMBRE_ESTADO = $request->get('NOMBRE_ESTADO');
        $estado->STATUS = $request->get('STATUS');
        $estado->save();

        return redirect()->route('estados.index')
            ->with('success', 'País actualizado con éxito');
    }

    public function destroy($id)
    {
        $estado = Estado::find($id)->delete();

        return redirect()->route('estados.index')
            ->with('success', 'Estado eliminado con exito');
    }
}
