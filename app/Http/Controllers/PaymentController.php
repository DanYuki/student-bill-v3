<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Auth\Events\Validated;
use App\Models\StudentBill;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $s_bills = StudentBill::where('student_id', $id)->get();
        $payments = PaymentHistory::where('student_id', $id)->get();

        return view('students.payment', compact('s_bills', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_amount' => 'required|integer|gt:0',
        ], [
            'p_amount.gt' => "Nominal pembayaran tidak boleh Rp. 0",
            'p_amount.required' => "Nominal pembayaran tidak boleh kosong"
        ]);
        PaymentHistory::create([
            'student_id' => $request->student_id,
            'p_amount' => $request->p_amount
        ]);
        return redirect()->route('student.show', $request->student_id)->with('success', 'Payment successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
