<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::paginate();

        return view('persona.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    public function create()
    {
        $persona = new Persona();
        return view('persona.create', compact('persona'));
    }

    public function store(Request $request)
    {
        request()->validate(Pais::$rules);

        //$pais = Pais::create($request->all());
        $pais = new Pais();
        $pais->NOMBRE_PAIS = $request->get('NOMBRE_PAIS');
        $pais->STATUS = $request->get('STATUS');
        $date = Carbon::now();
        $date = $date->format('Ymd H:i:s');
        $pais->DATETIME = $date;
        $pais->save();

        return redirect()->route('paises.index')
            ->with('success', 'Pais creada exitosamente');
    }

    public function show($id)
    {
        $pais = pais::find($id);

        return view('pais.show', compact('pais'));
    }

    public function edit($id)
    {
        $pais = Pais::find($id);

        return view('pais.edit', compact('pais'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate(Pais::$rules);

        //$pais->update($request->all());

        $pais = Pais::find($id);
        $pais->NOMBRE_PAIS = $request->get('NOMBRE_PAIS');
        $pais->STATUS = $request->get('STATUS');
        $pais->save();

        return redirect()->route('paises.index')
            ->with('success', 'País actualizado con éxito');
    }

    public function destroy($id)
    {
        $pais = Pais::find($id)->delete();

        return redirect()->route('paises.index')
            ->with('success', 'Pais eliminado con exito');
    }
}
