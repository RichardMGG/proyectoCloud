<?php
// Incluir archivo de conexión a la base de datos
include("conexion.php");

$mensaje = "";

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar valores de los campos del formulario
    $documento = $_POST["numero"];
    $nombre = $_POST["nombre_razon_social"];
    $direccion = $_POST["direccion"];
    $departamento = $_POST["departamento"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    // Preparar consulta INSERT
    $sql = "INSERT INTO registro (documento, nombre_razonSocial, direccion, departamento, correo, telefono) VALUES ('$documento', '$nombre', '$direccion','$departamento','$correo','$telefono')";

    // Ejecutar consulta INSERT
    if (mysqli_query($conn, $sql)) {
        $mensaje = "Nuevo registro insertado correctamente";
        header("Location: tabla.php?mensaje=$mensaje");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<?php if (isset($_GET["mensaje"])): ?>
    <script>
        alert("<?php echo $_GET['mensaje']; ?>");
    </script>
<?php endif; ?>