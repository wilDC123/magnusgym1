<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Membership;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('membership.client', 'membership.plan')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $memberships = Membership::with('client', 'plan')->get();
        return view('payments.create', compact('memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_membership' => 'required|exists:memberships,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'El pago fue registrado correctamente');
    }

    public function show($id)
    {
        $payment = Payment::with('membership.client', 'membership.plan')->find($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
        $memberships = Membership::with('client', 'plan')->get();
        return view('payments.edit', compact('payment', 'memberships'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_membership' => 'required|exists:memberships,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::find($id);
        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'El pago se ha modificado correctamente');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'El pago fue eliminado correctamente');
    }
}
