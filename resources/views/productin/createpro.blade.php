<!-- Add product input form -->
<div class="mt-4">
    <h3>Add New Product In</h3>
    <form action="{{ route('product.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Add Product</button>
    </form>
</div>