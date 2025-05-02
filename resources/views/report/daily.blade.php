@extends('layouts.app')

@section('content')
    <h2>Daily Product In Report ({{ \Carbon\Carbon::now()->toDateString() }})</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
        @forelse($report as $entry)
            <tr>
                <td>{{ $entry->product->PName }}</td>
                <td>{{ $entry->prIn_Date }}</td>
                <td>{{ $entry->prIn_Quantity }}</td>
                <td>{{ $entry->prIn_Unit_Price }}</td>
                <td>{{ $entry->prIn_TotalPrice }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">No records today.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
