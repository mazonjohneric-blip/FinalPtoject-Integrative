<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-5">

    <!-- TITLE -->
    <h1 class="text-center text-white mb-4 fw-bold">Admin Dashboard</h1>

    <!-- FORM CARD -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Add Product</h4>

            <form id="productForm">
                <input type="hidden" id="id">

                <input type="text" id="product_name" class="form-control mb-3" placeholder="Product Name" required>

                <input type="number" id="price" class="form-control mb-3" placeholder="Price" required>

                <textarea id="description" class="form-control mb-3" placeholder="Description"></textarea>

                <div class="text-end">
                    <button class="btn btn-success px-4">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title mb-3">Product List</h4>

            <table class="table table-hover text-center">
                <thead class="table-dark">
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
    </div>

</div>

<!-- CLEAN BACKGROUND -->
<style>
body {
    background: linear-gradient(to right, #141e30, #243b55);
    font-family: 'Segoe UI', sans-serif;
}

/* Card design */
.card {
    border-radius: 15px;
}

/* Button hover */
.btn:hover {
    transform: scale(1.05);
    transition: 0.2s;
}
</style>

<script src="script.js"></script>
</body>
</html>