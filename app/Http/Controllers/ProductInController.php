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

    public function create()
    {
        $products = Product::all();
        return view('productin.create', compact('products'));
    }

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

    public function dailyReport()
    {
        $today = now()->toDateString();
        $report = ProductIn::whereDate('prIn_Date', $today)->with('product')->get();
        return view('report.daily', compact('report'));
    }
    public function destroy(ProductIn $productIn)
    {
        $productIn->delete();
        return redirect()->route('product-in.index')->with('success', 'Product In deleted.');
    }
}
