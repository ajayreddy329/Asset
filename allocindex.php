<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asset Allocation</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 95%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Asset Master</h1>
        <form id="assetForm" action="db_connect.php" method="post">
            <button type="submit">Submit</button> <!-- Submit button -->
            <button type="button" onclick="addRow()">Add Row</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Asset Class</th>
                        <th>Inventory Number</th>
                        <th>Location</th>
                        <th>Allocation Location</th>
                        <th>Allocation Sub Location</th>
                        <th>Department</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="assetTable">
                <!-- Existing rows will be populated dynamically -->
                </tbody>
            </table>
        </form>
    </div>

    <script>
        function addRow() {
            const table = document.getElementById('assetTable');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td></td>
                <td><input type="text" name="asset_class"></td>
                <td><input type="text" name="inv_num"></td>
                <td><input type="text" name="location"></td>
                <td><input type="text" name="alloc_location"></td>
                <td><input type="text" name="alloc_sub_loc"></td>
                <td><input type="text" name="department"></td>
                <td><input type="text" name="user[]"></td>
                <td><button type="button" onclick="deleteRow(this)">Delete</button></td>
            `;
            table.appendChild(newRow);
            updateSerialNumbers();
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
            updateSerialNumbers();
        }

        function updateSerialNumbers() {
            const rows = document.querySelectorAll('#assetTable tr');
            rows.forEach((row, index) => {
                const cells = row.querySelectorAll('td');
                cells[0].textContent = index + 1;
            });
        }
    </script>
</body>
</html>
