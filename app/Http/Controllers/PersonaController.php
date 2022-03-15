<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $personas = Persona::get();
        return view('persona.index', ['personas' => $personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::get();
        $municipios = Municipio::where('Departamento', '=', 1)->get();
        return view('persona.create', ['municipios' => $municipios, 'departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->Nombre = $request->get('Nombre');
        $persona->Apellido = $request->get('Apellido');
        $persona->Municipio = $request->get('Municipio');
        $persona->Telefono = $request->get('Telefono');
        $persona->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('persona/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);

        $departamentos = Departamento::get();
        $municipios = Municipio::where('Departamento', '=', $persona->municipios->Departamento)->get();

        return view('persona.edit', ['persona' => $persona, 'departamentos' => $departamentos, 'municipios' => $municipios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->Nombre = $request->get('Nombre');
        $persona->Apellido = $request->get('Apellido');
        $persona->Municipio = $request->get('Municipio');
        $persona->Telefono = $request->get('Telefono');
        $persona->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('persona/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('persona');
    }

    public function get_municipio($id)
    {
        return Municipio::where('Departamento', '=', $id)->get();
        //dd($a);
    }
}
