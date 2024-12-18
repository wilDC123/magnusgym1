<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\Client;
use App\Models\Plan;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with(['client', 'plan'])->get();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        $clients = Client::all();
        $plans = Plan::all();
        return view('memberships.create', compact('clients', 'plans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id',
            'id_plan' => 'required|exists:plans,id',
        ]);

        Membership::create($request->all());
        return redirect()->route('memberships.index')->with('success', 'La membresía fue creada correctamente');
    }

    public function show($id)
    {
        $membership = Membership::with(['client', 'plan'])->find($id);
        return view('memberships.show', compact('membership'));
    }

    public function edit($id)
    {
        $membership = Membership::find($id);
        $clients = Client::all();
        $plans = Plan::all();
        return view('memberships.edit', compact('membership', 'clients', 'plans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id',
            'id_plan' => 'required|exists:plans,id',
        ]);

        $membership = Membership::find($id);
        $membership->update($request->all());
        return redirect()->route('memberships.index')->with('success', 'La membresía se ha modificado correctamente');
    }

    public function destroy($id)
    {
        $membership = Membership::find($id);
        $membership->delete();
        return redirect()->route('memberships.index')->with('success', 'La membresía fue eliminada correctamente');
    }
}
