<?php
// Incluir el archivo de la clase Paciente y la función de conexión
require_once('conexion.php');
require_once('Paciente.php');

// Verificar si se ha enviado el formulario de consulta de paciente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['consultar'])) {
    // Obtener el nombre y apellidos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    // Crear una instancia de la clase Paciente
    $paciente = new Paciente();

    // Consultar al paciente por nombre y apellidos
    $resultado = $paciente->consultarPacientePorNombre($nombre, $apellidos);

    // Mostrar los resultados
    if ($resultado->num_rows > 0) {
        echo "<h2>Resultados de la consulta:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Fecha Nacimiento</th><th>Sexo</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$fila['idPaciente']."</td>";
            echo "<td>".$fila['pacNombres']."</td>";
            echo "<td>".$fila['pacApellidos']."</td>";
            echo "<td>".$fila['pacFechaNacimiento']."</td>";
            echo "<td>".$fila['pacSexo']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron pacientes con ese nombre y apellidos.";
    }
}

// Verificar si se ha enviado el formulario de actualización de paciente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar'])) {
    // Obtener los datos del formulario de actualización
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Crear una instancia de la clase Paciente
    $paciente = new Paciente();

    // Actualizar los datos del paciente
    $paciente->setIdPaciente($id);
    $paciente->setNombres($nombre);
    $paciente->setApellidos($apellidos);
    $paciente->setDireccion($direccion);
    $paciente->setEmail($email);
    $paciente->setTelefono($telefono);

    $resultado = $paciente->actualizarPaciente();

    // Mostrar mensaje de éxito o error
    if ($resultado) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos del paciente.";
    }
}
?>