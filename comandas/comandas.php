<?php
require_once 'database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">CRUD con Bootstrap</h1>
        <form id="crud-form" class="form-inline justify-content-center mb-4">
            <input type="text" id="name" class="form-control mr-2" placeholder="Nombre">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        document.getElementById('crud-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            if (name) {
                addRow(name);
                document.getElementById('name').value = '';
            }
        });

        function addRow(name) {
            const table = document.querySelector('table tbody');
            const newRow = table.insertRow();
            const nameCell = newRow.insertCell(0);
            const actionsCell = newRow.insertCell(1);

            nameCell.textContent = name;
            actionsCell.innerHTML = `
                <button class="btn btn-warning btn-sm mr-2" onclick="editRow(this)">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">Eliminar</button>
            `;
        }

        function editRow(button) {
            const row = button.parentNode.parentNode;
            const nameCell = row.cells[0];
            const newName = prompt('Editar nombre:', nameCell.textContent);
            if (newName) {
                nameCell.textContent = newName;
            }
        }

        function deleteRow(button) {
            if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {
                const row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>