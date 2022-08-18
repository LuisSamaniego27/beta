<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Preinscripcion;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::orderBy('ID_PERSONA', 'desc')->paginate();

        return view('persona.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    public function create()
    {
        $persona = new Persona();
        $ciudades = Ciudad::all();
        $preinscripciones = new Preinscripcion();

        return view('persona.create', compact('persona', 'ciudades', 'preinscripciones'));
    }

    public function store(Request $request)
    {
        request()->validate(Persona::$rules);

        $persona = new Persona();
        $persona->DOCUMENTO = $request->get('DOCUMENTO');
        $persona->NOMBRE_PERSONA = $request->get('NOMBRE_PERSONA');
        $persona->APELLIDO_PERSONA = $request->get('APELLIDO_PERSONA');
        $persona->SEXO = $request->get('SEXO');
        $persona->FECHA_NACIMIENTO = $request->get('FECHA_NACIMIENTO');
        $persona->ID_CIUDAD = $request->get('ID_CIUDAD');
        $persona->ID_ATRIBUCION = 5;
        $persona->TIPO_FISICO_JURIDICO = 1;
        $persona->STATUS = 1;
        $date = Carbon::now();
        $date = $date->format('Ymd H:i:s');
        $persona->DATETIME = $date;
        $persona->save();


        return redirect()->route('personas.show', $persona->ID_PERSONA)
            ->with('success', 'Persona creada exitosamente'); 

    }

    public function show($id)
    {
        $persona = Persona::find($id);
        $preincripcion = Preinscripcion::all();

        return view('persona.show', compact('persona', 'preincripcion'));
    }

    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('persona.edit', compact('persona'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate(Persona::$rules);

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
        $persona = Persona::find($id)->delete();

        return redirect()->route('personas.index')
            ->with('success', 'Persona eliminada con exito');
    }
}
