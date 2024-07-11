<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paciente_nombre']) && isset($_POST['paciente_apellidos']) && isset($_POST['fecha'])) {
    // Recoger datos del formulario
    $id = $_POST['paciente_nombre']; // Considerando que el campo 'paciente_nombre' en el formulario es para el ID del paciente
    $contrasena = $_POST['paciente_apellidos']; // Considerando que el campo 'paciente_apellidos' en el formulario es para la contraseña
    $fecha = $_POST['fecha'];

    // Validar y procesar los datos según tus necesidades
    // Aquí podrías realizar la lógica para consultar el historial médico del paciente
    // Por ejemplo, conectar a la base de datos y ejecutar la consulta según el ID y la contraseña
    
    // Ejemplo de salida de datos o procesamiento ficticio
    echo "<h4>Historial Médico Consultado</h4>";
    echo "<p>ID Paciente: $id</p>";
    echo "<p>Contraseña: $contrasena</p>";
    echo "<p>Fecha Consultada: $fecha</p>";
    // Aquí podrías mostrar los resultados del historial médico o realizar otras acciones necesarias
}
?>
