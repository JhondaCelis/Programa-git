<?php
// Consultar Datos Paciente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellidos'])) {
    // Aquí deberías realizar la lógica para consultar los datos del paciente
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    
    // Ejemplo de consulta ficticia
    // Aquí podrías conectar a tu base de datos y ejecutar la consulta
    // Suponiendo que recuperas los datos de la base de datos, podrías mostrarlos o procesarlos de alguna manera
    echo "<h4>Datos del Paciente Consultado</h4>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    // Aquí podrías mostrar más detalles o realizar otras acciones necesarias
}

// Guardar Datos Paciente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['direccion']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    // Aquí deberías realizar la lógica para guardar los datos del paciente
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    
    // Ejemplo de guardado ficticio
    // Aquí podrías conectar a tu base de datos y ejecutar la inserción de datos
    // Suponiendo que guardas los datos en la base de datos, podrías mostrar un mensaje de éxito o realizar otras acciones necesarias
    echo "<h4>Datos del Paciente Guardados</h4>";
    echo "<p>ID: $id</p>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellidos: $apellidos</p>";
    echo "<p>Dirección: $direccion</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Teléfono: $telefono</p>";
    // Aquí podrías mostrar un mensaje de éxito o redireccionar a otra página
}
?>
