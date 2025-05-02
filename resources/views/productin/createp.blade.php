<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h1>Add a New Product</h1>

    <!-- Display success message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Form to add a new product -->
    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <!-- Product Name input -->
        <label for="PName">Product Name:</label>
        <input type="text" name="PName" id="PName" value="{{ old('PName') }}" required>

        <!-- Display validation errors -->
        @error('PName')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
