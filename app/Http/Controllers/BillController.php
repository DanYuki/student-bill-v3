<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bills = Bill::all();
        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'bill_name' => 'required|min:5',
            'bill_amount' => 'required|integer',
            'bill_description' => 'required|min:5'
        ]);

        Bill::create([
            'bill_name' => addslashes($request->bill_name),
            'bill_amount' => $request->bill_amount,
            'bill_description' => addslashes($request->bill_description) 
        ]);

        return redirect()->route('bill.index')->with('success', 'New bill inserted successfully');
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
        $bill = Bill::find($id);
        return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bill = Bill::find($id);
        $bill->bill_name = $request->bill_name;
        $bill->bill_amount = $request->bill_amount;
        $bill->bill_description = $request->bill_description;
        $bill->save();
        return redirect()->route('bill.index')->with('success', 'Data edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->route('bill.index')->with('success', 'Data deleted');
    }
}
