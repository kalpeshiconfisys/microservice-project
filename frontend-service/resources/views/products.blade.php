<!DOCTYPE html>
<html>
<head>
    <title>Products</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
        }

        .container {
            width: 80%;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th {
            padding: 12px;
            background: #4f46e5;
            color: white;
        }
        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        table tr:hover {
            background: #f9fafb;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0 12px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background: #4f46e5;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }

        .edit-btn {
            background: #10b981;
        }
        .delete-btn {
            background: #ef4444;
        }

        .msg {
            background: #d1fae5;
            padding: 10px;
            border-left: 4px solid #10b981;
            color: #065f46;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 25px;
            width: 400px;
            border-radius: 10px;
        }

        .close {
            float: right;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
        }
    </style>

    <script>
        function openEdit(id, name, price) {
            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('editName').value = name;
            document.getElementById('editPrice').value = price;
            document.getElementById('editForm').action = "/products/update/" + id;
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>

</head>

<body>

<div class="container">

    <div class="card">
        <h2>Product List</h2>

        @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
        @endif

        <div style="text-align: right; margin-bottom: 15px;">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" style="background:#ef4444;">Logout</button>
            </form>
        </div>

        <table>
            <tr>
                <th>Name</th>
                <th>Price (₹)</th>
                <th>Action</th>
            </tr>

            @foreach($products as $p)
            <tr>
                <td>{{ $p['name'] }}</td>
                <td>{{ $p['price'] }}</td>
                <td>
                    <button class="edit-btn" onclick="openEdit('{{ $p['id'] }}','{{ $p['name'] }}','{{ $p['price'] }}')">Edit</button>
                    <a href="/products/delete/{{ $p['id'] }}">
                        <button class="delete-btn">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="card">
        <h3>Add New Product</h3>

        <form method="POST" action="/products">
            @csrf
            <input name="name" placeholder="Product Name" required>
            <input name="price" placeholder="Price" type="number" required>
            <button type="submit">Add Product</button>
        </form>
    </div>

</div>

<!-- Edit Product Modal -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">×</span>
        <h3>Edit Product</h3>

        <form id="editForm" method="POST">
            @csrf
            <input id="editName" name="name" required>
            <input id="editPrice" name="price" type="number" required>
            <button type="submit">Update</button>
        </form>
    </div>
</div>

</body>
</html>
