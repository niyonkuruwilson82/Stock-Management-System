<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductIn;
use Illuminate\Http\Request;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = ProductIn::with('product')->get();
        return view('productin.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('productin.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PCode' => 'required',
            'prIn_Date' => 'required|date',
            'prIn_Quantity' => 'required|numeric',
            'prIn_Unit_Price' => 'required|numeric'
        ]);

        $total = $request->prIn_Quantity * $request->prIn_Unit_Price;

        ProductIn::create([
            'PCode' => $request->PCode,
            'prIn_Date' => $request->prIn_Date,
            'prIn_Quantity' => $request->prIn_Quantity,
            'prIn_Unit_Price' => $request->prIn_Unit_Price,
            'prIn_TotalPrice' => $total,
        ]);

        return redirect()->route('product-in.index')->with('success', 'Product In recorded.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $record = ProductIn::findOrFail($id);
        $products = Product::all();

        return view('productin.edit', compact('record', 'products'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'PCode' => 'required|exists:products,PCode',
            'prIn_Date' => 'required|date',
            'prIn_Quantity' => 'required|numeric',
            'prIn_Unit_Price' => 'required|numeric'
        ]);

        $total = $request->prIn_Quantity * $request->prIn_Unit_Price;

        $record = ProductIn::findOrFail($id);
        $record->update([
            'PCode' => $request->PCode,
            'prIn_Date' => $request->prIn_Date,
            'prIn_Quantity' => $request->prIn_Quantity,
            'prIn_Unit_Price' => $request->prIn_Unit_Price,
            'prIn_TotalPrice' => $total,
        ]);

        return redirect()->route('product-in.index')->with('success', 'Product In updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductIn $productIn)
    {
        $productIn->delete();
        return redirect()->route('product-in.index')->with('success', 'Product In deleted.');
    }

    /**
     * Show daily report of product in.
     */
    public function dailyReport()
    {
        $today = now()->toDateString();
        $report = ProductIn::whereDate('prIn_Date', $today)->with('product')->get();
        return view('report.daily', compact('report'));
    }
    
    
}

