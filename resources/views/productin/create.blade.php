@extends('layouts.app')

@section('content')
    <h2>Add Product In Entry</h2>

    <form method="POST" action="{{ route('product-in.store') }}">
        @csrf

        <div class="mb-3">
            <label for="PCode" class="form-label">Product</label>
            <select name="PCode" class="form-select" required>
                <option value="">-- Select Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->PCode }}">{{ $product->PName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="prIn_Date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="prIn_Quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Unit Price</label>
            <input type="number" name="prIn_Unit_Price" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

