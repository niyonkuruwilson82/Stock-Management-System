@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Product In Records</h2>

        <a href="{{ route('product-in.create') }}" class="btn btn-primary mb-3">Add New Entry</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($records as $record)
                    <tr>
                        <td>{{ $record->ProductIn_id }}</td>
                        <td>{{ $record->product->PName }}</td>
                        <td>{{ $record->prIn_Date }}</td>
                        <td>{{ $record->prIn_Quantity }}</td>
                        <td>{{ $record->prIn_Unit_Price }}</td>
                        <td>{{ $record->prIn_TotalPrice }}</td>
                        <td class="text-center">
                            <a href="{{ route('product-in.edit', $record->ProductIn_id) }}"  class="btn btn-warning btn-sm">Update</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('product-in.destroy', $record->ProductIn_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer class="bg-dark text-white text-center py-3 mt-5">
            <p>&copy; {{ date('Y') }} Designed by Niyonkuru Wilson. All Rights Reserved.</p>
        </footer>
    </div>
@endsection
