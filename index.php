<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">

    <h2>Product Form</h2>

    <form id="productForm">
        <input type="hidden" id="id">

        <input type="text" id="product_name" class="form-control mb-2" placeholder="Product Name" required>
        <input type="number" id="price" class="form-control mb-2" placeholder="Price" required>
        <textarea id="description" class="form-control mb-2" placeholder="Description"></textarea>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

    <hr>

    <h2>Product List</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTable"></tbody>
    </table>

</div>

<script src="script.js"></script>
</body>
</html>