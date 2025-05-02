<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model

class ProductController extends Controller
{
    // Show the form to create a new product
    public function create()
    {
        return view('product.create');
    }

    // Store the new product in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'PName' => 'required|string|max:255', // Validation rule for PName
        ]);

        // Create a new product record
        Product::create([
            'PName' => $request->PName, // Save product name
        ]);

        // Redirect or return a response
        return redirect()->route('product.create')->with('success', 'Product added successfully!');
    }
}
