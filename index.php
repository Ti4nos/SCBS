<?php
// Include database connection
require '../connection.php'; // Ensure this points to the correct file
?>
<html>
<head>
    <title>Multiple Item Input</title>
    <script>
        function addItemRow() {
            const container = document.getElementById('itemContainer');
            const div = document.createElement('div');
            div.classList.add('item-row');
            div.innerHTML = `
                <input type="text" name="itemname[]" placeholder="Item Name" required>
                <input type="number" name="quantity[]" placeholder="Quantity" min="1" required>
                <input type="number" name="price[]" step="0.01" placeholder="Price" required>
                <button type="button" onclick="this.parentElement.remove()">Remove</button>
            `;
            container.appendChild(div);
        }
    </script>
</head>
<body>

<h2>Add Items</h2>

<form method="POST" action="save_items.php">
    <div id="itemContainer">
        <div class="item-row">
            <input type="text" name="itemname[]" placeholder="Item Name" required>
            <input type="number" name="quantity[]" placeholder="Quantity" min="1" required>
            <input type="number" name="price[]" step="0.01" placeholder="Price" required>
        </div>
    </div>

    <button type="button" onclick="addItemRow()">Add Item</button><br><br>
    <input type="submit" value="Submit Items">
</form>

</body>
</html>
