<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshift;

class WorkshiftController extends Controller
{
    public function index(Request $request)
    {
        $workshifts = Workshift::all();
        return view('workshifts.index', compact('workshifts'));
    }

    public function create()
    {
        return view('workshifts.create');
    }

    public function store(Request $request)
    {
        Workshift::create($request->all());
        return redirect()->route('workshifts.index')->with('success', 'El horario fue creado correctamente');
    }

    public function show(string $id)
    {
        $workshift = Workshift::find($id);
        return view('workshifts.show', compact('workshift'));
    }

    public function edit($id)
    {
        $workshift = Workshift::find($id);
        return view('workshifts.edit', compact('workshift'));
    }

    public function update(Request $request, $id)
    {
        $workshift = Workshift::find($id);
        $workshift->update($request->all());
        return redirect()->route('workshifts.index')->with('success', 'El horario se ha modificado correctamente');
    }

    public function destroy(string $id)
    {
        $workshift = Workshift::find($id);
        $workshift->delete();
        return redirect()->route('workshifts.index')->with('success', 'El horario fue eliminado correctamente');
    }
}
