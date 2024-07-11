<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellidos'])) {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    // Validar y procesar los datos según tus necesidades
    // Aquí podrías realizar la lógica para consultar los datos del médico
    // Por ejemplo, conectar a la base de datos y ejecutar la consulta según el nombre y apellidos
    
    // Ejemplo de salida de datos o procesamiento ficticio
    echo "<h4>Datos Médico Consultado</h4>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    // Aquí podrías mostrar los resultados de la consulta médica o realizar otras acciones necesarias
}
?>
