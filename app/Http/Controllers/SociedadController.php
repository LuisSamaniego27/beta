<?php

namespace App\Http\Controllers;

use App\Models\Sociedad;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class SociedadController extends Controller
{
    public function index()
    {
        $sociedades = Sociedad::paginate();

        return view('sociedad.index', compact('sociedades'))
            ->with('i', (request()->input('page', 1) - 1) * $sociedades->perPage());
    }

    public function create()
    {
        $sociedad = new Sociedad();
        return view('sociedad.create', compact('sociedad'));
    }

    public function store(Request $request)
    {
        request()->validate(Sociedad::$rules);

        $sociedad = new Sociedad();
        $sociedad->NOMBRE_SOCIEDAD = $request->get('NOMBRE_SOCIEDAD');
        $sociedad->STATUS = $request->get('STATUS');
        $sociedad->DIRECCION = $request->get('DIRECCION');
        $sociedad->LATITUD = $request->get('LATITUD');
        $sociedad->LONGITUD = $request->get('LONGITUD');
        //$date = Carbon::now();
        $date = new DateTime("now");
        $date = $date->format('Ymd H:i:s');
        $sociedad->DATETIME = $date;
        $sociedad->save();

        return redirect()->route('sociedades.index')
            ->with('success', 'Sociedad creado exitosamente');
            
    }

    public function show($id)
    {
        $sociedad = Sociedad::find($id);

        return view('sociedad.show', compact('sociedad'));
    }

    public function edit($id)
    {

        $sociedad = Sociedad::find($id);
        
        return view('sociedad.edit', compact('sociedad'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate(Sociedad::$rules);

        $sociedad = Sociedad::find($id);
        $sociedad->NOMBRE_SOCIEDAD = $request->get('NOMBRE_SOCIEDAD');
        $sociedad->STATUS = $request->get('STATUS');
        $sociedad->DIRECCION = $request->get('DIRECCION');
        $sociedad->LATITUD = $request->get('LATITUD');
        $sociedad->LONGITUD = $request->get('LONGITUD');
        $sociedad->save();

        return redirect()->route('sociedades.index')
            ->with('success', 'Sociedad actualizado con éxito');
    }


    public function destroy($id)
    {
        $sociedad = Sociedad::find($id)->delete();

        return redirect()->route('sociedades.index')
            ->with('success', 'Sociedad eliminado con exito');
    }
}
