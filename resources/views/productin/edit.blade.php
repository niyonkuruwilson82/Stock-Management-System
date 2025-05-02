@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Product In Entry</h2>

    <form action="{{ route('product-in.update', $record->ProductIn_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $record->product_id ? 'selected' : '' }}>
                        {{ $product->PName }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="prIn_Date" class="form-label">Date</label>
            <input type="date" name="prIn_Date" class="form-control" value="{{ $record->prIn_Date }}" required>
        </div>

        <div class="mb-3">
            <label for="prIn_Quantity" class="form-label">Quantity</label>
            <input type="number" name="prIn_Quantity" class="form-control" value="{{ $record->prIn_Quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="prIn_Unit_Price" class="form-label">Unit Price</label>
            <input type="number" step="0.01" name="prIn_Unit_Price" class="form-control" value="{{ $record->prIn_Unit_Price }}" required>
        </div>

        <div class="mb-3">
            <label for="prIn_TotalPrice" class="form-label">Total Price</label>
            <input type="number" step="0.01" name="prIn_TotalPrice" class="form-control" value="{{ $record->prIn_TotalPrice }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Entry</button>
        <a href="{{ route('product-in.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
