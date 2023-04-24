<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Lista de Registros</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Registros</h1>
            <button type="button" class="btn btn-primary mt-4" name="Nuevo" id="Nuevo"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg> Nuevo Registro
            </button>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre o Razón Social</th>
                    <th>Dirección</th>
                    <th>Departamento</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir archivo de conexión a la base de datos
                include("conexion.php");

                // Preparar consulta SELECT
                $sql = "SELECT * FROM registro";

                // Ejecutar consulta SELECT y obtener resultados
                $result = mysqli_query($conn, $sql);

                // Recorrer resultados y mostrar en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["documento"] . "</td>";
                    echo "<td>" . $row["nombre_razonSocial"] . "</td>";
                    echo "<td>" . $row["direccion"] . "</td>";
                    echo "<td>" . $row["departamento"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["telefono"] . "</td>";
                    echo "</tr>";
                }

                // Liberar resultados de la memoria
                mysqli_free_result($result);

                // Cerrar conexión a la base de datos
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <script>
        document.getElementById("Nuevo").addEventListener("click", function(){
        window.location.href = "index.html";
        });
    </script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
