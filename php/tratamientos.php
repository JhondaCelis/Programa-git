<?php
// Asegúrate de que se haya definido una conexión a la base de datos
include 'db_conexion.php';

class Tratamiento
{
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $tratamiento;
    private $Conexion;

    // Constructor
    public function __construct($nombre, $apellido, $email, $telefono, $tratamiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->tratamiento = $tratamiento;
    }

    // Métodos Accesores y Modificadores
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function getNombre() { return $this->nombre; }

    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function getApellido() { return $this->apellido; }

    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }

    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function getTelefono() { return $this->telefono; }

    public function setTratamiento($tratamiento) { $this->tratamiento = $tratamiento; }
    public function getTratamiento() { return $this->tratamiento; }

    // Método para guardar la información del formulario
    public function guardarInformacion()
    {
        $this->Conexion = Conectarse();
        $sql = "INSERT INTO solicitudes_informacion (nombre, apellido, email, telefono, tratamiento) 
                VALUES ('$this->nombre', '$this->apellido', '$this->email', '$this->telefono', '$this->tratamiento')";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}

// Manejo del formulario de solicitud de información
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $tratamiento = $_POST['tratamiento'];

    $tratamientoObj = new Tratamiento($nombre, $apellido, $email, $telefono, $tratamiento);
    if ($tratamientoObj->guardarInformacion()) {
        echo "Información enviada correctamente.";
    } else {
        echo "Error al enviar la información.";
    }
}
?>