document.addEventListener('DOMContentLoaded', function() {
    const searchText = document.getElementById('searchText');
    const tableRows = document.querySelectorAll('.table tbody tr');

    searchText.addEventListener('keyup', function() {
        const searchTerm = searchText.value.toLowerCase();

        tableRows.forEach(function(row) {
            const columns = row.querySelectorAll('td');

            let found = false;
            columns.forEach(function(col) {
                if (col.textContent.toLowerCase().includes(searchTerm)) {
                    found = true;
                }
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});