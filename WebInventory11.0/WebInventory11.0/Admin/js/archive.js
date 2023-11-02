document.addEventListener("DOMContentLoaded", function () {
  // Dummy data for demonstration
  const archivedProducts = [
    { name: "Product 1", id: "123", category: "Electronics" },
    // Add more product objects as needed
  ];

  const tbody = document.querySelector(".product-table tbody");

  archivedProducts.forEach((product) => {
    const row = document.createElement("tr");
    row.innerHTML = `
            <td>${product.name}</td>
            <td>${product.id}</td>
            <td>${product.category}</td>
            <td class="product-actions">
                <a class='btn btn-success btn-sm' href='#'>
                    <i class="fas fa-undo"></i> Restore
                </a>
                <a class='btn btn-danger btn-sm' href='#'>
                    <i class="fas fa-trash-alt"></i> Delete
                </a>
            </td>
        `;
    tbody.appendChild(row);
  });
});
