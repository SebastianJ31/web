<?php
// Datos de conevion a la base de datos
$servername = "localhost";  // nombre del servidor mysql
$username = "root";  // nombre de usuario de base de datos
$password = ""; // contraseña de base de datos
$dbname = "consulta"; // nombre de la base de datos

// Crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexion
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$tipo_documento = $_POST["tipo_documento"];
$documento = $_POST["documento"];
$fecha_expedicion = $_POST["fecha_expedicion"];

// Consulta SQL con valores del formulario
$sql = "SELECT * FROM documentos WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$documento' AND fecha_expedicion = '$fecha_expedicion'";

// Ejecutar la consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html> 
<html> 
<head>
    <title>Resultados de la Consulta</title> 
    <style> /* Estilo de tabla*/
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body> 
    <h1>Resultados de la Consulta</h1> 

    <?php
    // Muestra la consulta en la tabla
    if ($result->num_rows > 0) {
        echo "<table>";
        // Muestra el encabezado de la tabla
        echo "<tr><th>Id</th><th>Nombre Completo</th><th>Tipo de Documento</th><th>Numero de Documento</th><th>Fecha de Expedicion</th><th>Edad</th><th>Sexo</th><th>Administradora</th><th>Fecha de Afilacion</th><th>Estado de Afilacion</th><th>Empresa o Empleador</th><th>Municipio</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            // Muestra Filas de datos
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre_completo"] . "</td>";
            echo "<td>" . $row["tipo_documento"] . "</td>";
            echo "<td>" . $row["numero_documento"] . "</td>";
            echo "<td>" . $row["fecha_expedicion"] . "</td>";
            echo "<td>" . $row["edad"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["administradora"] . "</td>";
            echo "<td>" . $row["fecha_afiliacion"] . "</td>";
            echo "<td>" . $row["estado_afiliado"] . "</td>";
            echo "<td>" . $row["empresa"] . "</td>";
            echo "<td>" . $row["municipio"] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    ?>

    <?php
    $conn->close(); // Cerrar la conexion
    ?>
</body>
</html>
