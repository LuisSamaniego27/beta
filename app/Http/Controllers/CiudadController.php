<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CiudadController extends Controller
{
    public function index()
    {
        $ciudades = Ciudad::paginate();

        return view('ciudad.index', compact('ciudades'))
            ->with('i', (request()->input('page', 1) - 1) * $ciudades->perPage());
    }

    public function create()
    {
        $ciudad = new Ciudad();
        return view('ciudad.create', compact('ciudad'));
    }

    /* public function store(Request $request)
    {
        request()->validate(Ciudad::$rules);

        //$pais = Pais::create($request->all());
        $pais = new Pais();
        $pais->NOMBRE_PAIS = $request->get('NOMBRE_PAIS');
        $pais->STATUS = $request->get('STATUS');
        $date = Carbon::now();
        $date = $date->format('Ymd H:i:s');
        $pais->DATETIME = $date;
        $pais->save();

        return redirect()->route('paises.index')
            ->with('success', 'Pais creado exitosamente(femenino)

            Buscar esto en G.');
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
    } */
}
