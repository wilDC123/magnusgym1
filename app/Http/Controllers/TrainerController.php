<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Workshift;
class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('workshift')->get(); 
        return view('trainers.index', compact('trainers'));
    }

    public function create()
    {
        $workshifts = Workshift::all(); 
        return view('trainers.create', compact('workshifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trainer_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:trainers,email',
            'id_workshift' => 'nullable|exists:workshifts,id',
        ]);

        Trainer::create($request->all());
        return redirect()->route('trainers.index')->with('success', 'El entrenador fue creado correctamente');
    }

    public function show($id)
    {
        $trainer = Trainer::with('workshift')->find($id);
        return view('trainers.show', compact('trainer'));
    }

    public function edit($id)
    {
        $trainer = Trainer::find($id);
        $workshifts = Workshift::all(); 
        return view('trainers.edit', compact('trainer', 'workshifts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'trainer_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:trainers,email,' . $id,
            'id_workshift' => 'nullable|exists:workshifts,id',
        ]);

        $trainer = Trainer::find($id);
        $trainer->update($request->all());
        return redirect()->route('trainers.index')->with('success', 'El entrenador se ha modificado correctamente');
    }

    public function destroy($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();
        return redirect()->route('trainers.index')->with('success', 'El entrenador fue eliminado correctamente');
    }
}
