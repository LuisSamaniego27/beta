<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Estado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EstadoController extends Controller
{
    public function index()
    {
        $estados = Estado::paginate();

        return view('estado.index', compact('estados'))
            ->with('i', (request()->input('page', 1) - 1) * $estados->perPage());
    }

    public function create()
    {
        $estado = new Estado();
        $paises = Pais::all();

        return view('estado.create', compact('estado'), compact('paises'));
    }

    public function store(Request $request)
    {
        request()->validate(Estado::$rules);

        $estado = new Estado();
        $estado->ID_PAIS = $request->get('ID_PAIS');
        $estado->NOMBRE_ESTADO = $request->get('NOMBRE_ESTADO');
        $estado->STATUS = $request->get('STATUS');
        $date = Carbon::now();
        $date = $date->format('Ymd H:i:s');
        $estado->DATETIME = $date;
        $estado->save();

        dd($estado);

        return redirect()->route('estados.index')
            ->with('success', 'Estado creado exitosamente');
    }

    public function show($id)
    {
        $estado = estado::find($id);

        return view('estado.show', compact('estado'));
    }
}
