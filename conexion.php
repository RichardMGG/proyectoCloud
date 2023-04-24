<?php
$servername = "database1web.mysql.database.azure.com";
$username = "Admininistrador";
$password = "serverMartinWeb1_1";
$dbname = "web1";

// Crear la conexión
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "ssl/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);

// Comprobar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// echo "Conexión exitosa";
?>