<?php
include '../database.php';

$sql = "SELECT * FROM comandas";
$stmt = $pdo->query($sql);
$comandas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMANDAS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .sort-button {
    background: transparent;
    border: none;
    color: #fff;
}
.sort-button:hover {
    color: #666;
}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">COMANDAS</h1>
        <form id="crud-form" class="form-inline justify-content-center mb-4" method="POST" action="create.php">
            <input type="text" name="mesa" class="form-control mr-2" placeholder="Mesa" required>
            <input type="text" name="comensales" class="form-control mr-2" placeholder="Comensales" required>
            <input type="text" name="ticket" class="form-control mr-2" placeholder="Ticket" required>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="../comandas/generatePDF.php" class="btn btn-primary">Generar PDF</a>
        </form>
        <table id= "comandas-table" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Comanda</th>
                    <th>Fecha</th>
                    <th>Mesa <button class="sort-button" data-column-index="3"><i class="fas fa-sort"></i></button></th>
                    <th>Comensales <button class="sort-button" data-column-index="3"><i class="fas fa-sort"></i></button></th>
                    <th>Hora</th>
                    <th>Ticket <button class="sort-button" data-column-index="3"><i class="fas fa-sort"></i></button></th>                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($comandas)): ?>
                    <?php foreach ($comandas as $comanda): ?>
                        <tr id="comanda-<?php echo $comanda['id_comanda']; ?>">
    <td><?php echo htmlspecialchars($comanda['id_comanda']); ?></td>
    <td><?php echo htmlspecialchars($comanda['fecha']); ?></td>
    <td>
    <input type="text" name="mesa" class="form-control" value="<?php echo htmlspecialchars($comanda['mesa']); ?>" readonly>
    </td>
    <td>
    <input type="text" name="comensales" class="form-control" value="<?php echo htmlspecialchars($comanda['comensales']); ?>" readonly>
    </td>
    <td><?php echo htmlspecialchars($comanda['hora']); ?></td>
    <td>
    <input type="text" name="ticket" class="form-control" value="<?php echo htmlspecialchars($comanda['ticket']); ?>" readonly>    </td>
    <td>
        <button class="btn btn-warning btn-sm edit-button">Editar</button>
    </td>
    <td>
        <form method="POST" action="delete.php">
            <input type="hidden" name="id" value="<?php echo $comanda['id_comanda']; ?>">
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No se encontraron comandas.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var rowId = this.closest('tr').id;
            var inputs = document.querySelectorAll('#' + rowId + ' input');

            if (this.textContent === 'Editar') {
                inputs.forEach(function(input) {
                    input.readOnly = false;
                });
                this.textContent = 'Guardar';
                this.classList.remove('btn-warning');
                this.classList.add('btn-success');
            } else {
                var data = {id: rowId.replace('comanda-', '')};
                inputs.forEach(function(input) {
                    data[input.name] = input.value;
                });

                var formData = new URLSearchParams();
                for (var key in data) {
                    formData.append(key, data[key]);
                }

                fetch('update.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud POST: ' + response.statusText);
                    }
                    return response;
                })
                .then(function(response) {
                    location.reload();
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var table = document.querySelector('#comandas-table');
    var tbody = table.querySelector('tbody');

    function sortTable(button, index) {
        var rows = Array.from(tbody.querySelectorAll('tr'));
        rows.sort(function(a, b) {
            var aValue = a.children[index].textContent;
            var bValue = b.children[index].textContent;

            var numAValue = Number(aValue);
            var numBValue = Number(bValue);

            if (!isNaN(numAValue) && !isNaN(numBValue)) {
                return button.classList.contains('asc') ? numAValue - numBValue : numBValue - numAValue;
            }

            return button.classList.contains('asc') ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
        });

        rows.forEach(function(row) {
            tbody.appendChild(row);
        });

        button.classList.toggle('asc');
    }

    var sortButtons = document.querySelectorAll('.sort-button');
    sortButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var columnIndex = this.dataset.columnIndex;
            sortTable(this, columnIndex);
        });
    });
});
</script>
</body>
</html>