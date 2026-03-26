document.addEventListener("DOMContentLoaded", () => {
    loadProducts();

    document.getElementById("productForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let id = document.getElementById("id").value;
        let product_name = document.getElementById("product_name").value;
        let price = document.getElementById("price").value;
        let description = document.getElementById("description").value;

        let url = id ? "update.php" : "create.php";

        let formData = new FormData();
        formData.append("id", id);
        formData.append("product_name", product_name);
        formData.append("price", price);
        formData.append("description", description);

        fetch(url, {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(() => {
            document.getElementById("productForm").reset();
            document.getElementById("id").value = "";
            loadProducts();
        });
    });
});

function loadProducts() {
    fetch("api.php")
        .then(res => res.json())
        .then(data => {
            let table = document.getElementById("productTable");
            table.innerHTML = "";

            data.forEach(product => {
                table.innerHTML += `
                    <tr>
                        <td>${product.id}</td>
                        <td>${product.product_name}</td>
                        <td>${product.price}</td>
                        <td>${product.description}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editProduct(${product.id}, '${product.product_name}', '${product.price}', '${product.description}')">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        });
}

function editProduct(id, name, price, description) {
    document.getElementById("id").value = id;
    document.getElementById("product_name").value = name;
    document.getElementById("price").value = price;
    document.getElementById("description").value = description;
}

function deleteProduct(id) {
    if (confirm("Are you sure?")) {
        let formData = new FormData();
        formData.append("id", id);

        fetch("delete.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(() => loadProducts());
    }
}