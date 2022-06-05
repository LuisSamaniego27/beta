<?php

namespace App\Http\Controllers;

use App\Models\Sociedad;
use Illuminate\Http\Request;
use Carbon\Carbon;

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


    public function destroy($id)
    {
        $sociedad = Sociedad::find($id)->delete();

        return redirect()->route('sociedades.index')
            ->with('success', 'Sociedad eliminado con exito');
    }
}
