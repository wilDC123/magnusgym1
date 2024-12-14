<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $clients = Client::where('first_name', 'like', '%' . $search . '%')
                                    ->orWhere('last_name', 'like', '%' . $search . '%')
                                    ->orWhere('ci', 'like', '%' . $search . '%')
                                    ->get();
        } else {
            $clients = Client::all();
        }

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'El cliente fue creado correctamente');
    }

    public function show(string $id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'El cliente se ha modificado correctamente');
    }

    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'El cliente fue eliminado correctamente');
    }
}
