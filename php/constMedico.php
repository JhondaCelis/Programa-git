<?php
// Verificar si se ha enviado el formulario de Consultar Médico
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellidos'])) {
    // Aquí deberías realizar la lógica para consultar el médico en tu base de datos o sistema
    // Simplemente aquí se muestra un ejemplo de cómo podrías capturar los datos y mostrarlos
    
    // Datos recibidos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    
    // Aquí puedes hacer la consulta a tu base de datos o sistema para obtener los datos del médico
    // Ejemplo de consulta ficticia
    // Suponiendo que tienes una función o método para obtener los datos del médico
    $medico = obtenerMedicoPorNombreApellidos($nombre, $apellidos); // Función ficticia
    
    // Mostrar los datos del médico si se encontró
    if ($medico) {
        echo "<h2>Datos del Médico Consultado:</h2>";
        echo "<ul>";
        echo "<li><strong>ID:</strong> " . $medico['id'] . "</li>";
        echo "<li><strong>Nombre:</strong> " . $medico['nombre'] . "</li>";
        echo "<li><strong>Apellidos:</strong> " . $medico['apellidos'] . "</li>";
        echo "<li><strong>Dirección:</strong> " . $medico['direccion'] . "</li>";
        echo "<li><strong>Email:</strong> " . $medico['email'] . "</li>";
        echo "<li><strong>Teléfono:</strong> " . $medico['telefono'] . "</li>";
        echo "<li><strong>Especialidad:</strong> " . $medico['especialidad'] . "</li>";
        echo "</ul>";
    } else {
        echo "<p>No se encontraron datos para el médico con los nombres y apellidos proporcionados.</p>";
    }
}

// Función ficticia para simular la obtención de datos del médico desde una base de datos
function obtenerMedicoPorNombreApellidos($nombre, $apellidos) {
    // Aquí podrías realizar la consulta real a tu base de datos
    // Por simplicidad, se simula la obtención de datos
    $medico = array(
        'id' => '1234',
        'nombre' => 'Pepito',
        'apellidos' => 'Perez',
        'direccion' => 'Calle 4° 5 - 5',
        'email' => 'sucorreo@gmail.com',
        'telefono' => '3053054000',
        'especialidad' => 'Oftalmologo'
    );
    return $medico;
}
?>
