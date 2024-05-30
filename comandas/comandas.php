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
$(document).ready(function() {
    $('.edit-button').click(function(e) {
        e.preventDefault();
        var rowId = $(this).closest('tr').attr('id');
        var inputs = $('#' + rowId + ' input');
        var button = $(this);

        if (button.text() === 'Editar') {
            inputs.prop('readonly', false);
            button.text('Guardar');
            button.removeClass('btn-warning');
            button.addClass('btn-success');
        } else {
            var data = {id: rowId.replace('comanda-', '')};
            inputs.each(function() {
                data[$(this).attr('name')] = $(this).val();
            });

            $.post('update.php', data, function(response) {
                inputs.prop('readonly', true);
                button.text('Editar');
                button.removeClass('btn-success');
                button.addClass('btn-warning');
            });
        }
    });
});
</script>
<script>
$(document).ready(function() {
    var table = $('#comandas-table');
    var tbody = table.find('tbody');

    function sortTable(button, index) {
        var rows = tbody.find('tr').toArray();
        rows.sort(function(a, b) {
            var aValue = $(a).children('td').eq(index).text();
            var bValue = $(b).children('td').eq(index).text();

            // Intenta convertir a números
            var numAValue = Number(aValue);
            var numBValue = Number(bValue);

            // Si ambos son números, compáralos como números
            if (!isNaN(numAValue) && !isNaN(numBValue)) {
                return button.hasClass('asc') ? numAValue - numBValue : numBValue - numAValue;
            }

            // De lo contrario, compáralos como texto
            return button.hasClass('asc') ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
        });

        rows.forEach(function(row) {
            tbody.append(row);
        });

        button.toggleClass('asc');
    }

    $('.sort-button').click(function() {
        var button = $(this);
        var columnIndex = button.data('column-index');
        sortTable(button, columnIndex);
    });
});
</script>
</body>
</html>