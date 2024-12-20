<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        return view('plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duracion_dias' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Plan::create($request->all());

        return redirect()->route('plans.index')->with('success', 'El plan fue creado correctamente');
    }

    public function show(string $id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.show', compact('plan'));
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duracion_dias' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $plan = Plan::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('plans.index')->with('success', 'El plan se ha modificado correctamente');
    }

    public function destroy(string $id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'El plan fue eliminado correctamente');
    }
}
