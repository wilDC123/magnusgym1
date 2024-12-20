<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Client;
use App\Models\Plan;

class MembershipController extends Controller
{
    // Listar todas las membresías
    public function index()
    {
        $memberships = Membership::with(['client', 'plan'])->get();
        return view('memberships.index', compact('memberships'));
    }

    // Mostrar el formulario para crear una nueva membresía
    public function create()
    {
        $clients = Client::all();
        $plans = Plan::all();
        return view('memberships.create', compact('clients', 'plans'));
    }

    // Guardar una nueva membresía
    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id',
            'id_plan' => 'required|exists:plans,id',
        ]);

        Membership::create([
            'id_client' => $request->id_client,
            'id_plan' => $request->id_plan,
        ]);

        return redirect()->route('memberships.index')->with('success', 'La membresía fue creada correctamente.');
    }

    // Mostrar una membresía específica
    public function show($id)
    {
        $membership = Membership::with(['client', 'plan'])->findOrFail($id);
        return view('memberships.show', compact('membership'));
    }

    // Mostrar el formulario para editar una membresía
    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        $clients = Client::all();
        $plans = Plan::all();
        return view('memberships.edit', compact('membership', 'clients', 'plans'));
    }

    // Actualizar una membresía existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id',
            'id_plan' => 'required|exists:plans,id',
        ]);

        $membership = Membership::findOrFail($id);
        $membership->update([
            'id_client' => $request->id_client,
            'id_plan' => $request->id_plan,
        ]);

        return redirect()->route('memberships.index')->with('success', 'La membresía se ha modificado correctamente.');
    }

    // Eliminar una membresía
    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();
        return redirect()->route('memberships.index')->with('success', 'La membresía fue eliminada correctamente.');
    }
}
