<?php
function Conectarse()
{
    $servername = "localhost"; // Cambia esto por tu servidor de base de datos
    $username = "usuario"; // Cambia esto por tu nombre de usuario de la base de datos
    $password = "contraseña"; // Cambia esto por tu contraseña de la base de datos
    $dbname = "nombre_base_de_datos"; // Cambia esto por el nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
?>
Crear la clase Cita y manejar el formulario (registrar_cita.php):
php
Copiar código
<?php
// Asegúrate de que se haya definido una conexión a la base de datos
include 'db_conexion.php';

class Cita
{
    private $paciente_nombre;
    private $paciente_apellidos;
    private $medico_nombre;
    private $medico_especialidad;
    private $fecha;
    private $hora;
    private $Conexion;

    // Constructor
    public function __construct($paciente_nombre, $paciente_apellidos, $medico_nombre, $medico_especialidad, $fecha, $hora)
    {
        $this->paciente_nombre = $paciente_nombre;
        $this->paciente_apellidos = $paciente_apellidos;
        $this->medico_nombre = $medico_nombre;
        $this->medico_especialidad = $medico_especialidad;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    // Métodos Accesores y Modificadores
    public function setPacienteNombre($paciente_nombre) { $this->paciente_nombre = $paciente_nombre; }
    public function getPacienteNombre() { return $this->paciente_nombre; }

    public function setPacienteApellidos($paciente_apellidos) { $this->paciente_apellidos = $paciente_apellidos; }
    public function getPacienteApellidos() { return $this->paciente_apellidos; }

    public function setMedicoNombre($medico_nombre) { $this->medico_nombre = $medico_nombre; }
    public function getMedicoNombre() { return $this->medico_nombre; }

    public function setMedicoEspecialidad($medico_especialidad) { $this->medico_especialidad = $medico_especialidad; }
    public function getMedicoEspecialidad() { return $this->medico_especialidad; }

    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function getFecha() { return $this->fecha; }

    public function setHora($hora) { $this->hora = $hora; }
    public function getHora() { return $this->hora; }

    // Método para guardar la información del formulario
    public function guardarCita()
    {
        $this->Conexion = Conectarse();
        $sql = "INSERT INTO citas (paciente_nombre, paciente_apellidos, medico_nombre, medico_especialidad, fecha, hora) 
                VALUES ('$this->paciente_nombre', '$this->paciente_apellidos', '$this->medico_nombre', '$this->medico_especialidad', '$this->fecha', '$this->hora')";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}

// Manejo del formulario de registro de cita
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_nombre = $_POST['paciente_nombre'];
    $paciente_apellidos = $_POST['paciente_apellidos'];
    $medico_nombre = $_POST['medico_nombre'];
    $medico_especialidad = $_POST['medico_especialidad'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $citaObj = new Cita($paciente_nombre, $paciente_apellidos, $medico_nombre, $medico_especialidad, $fecha, $hora);
    if ($citaObj->guardarCita()) {
        echo "Cita registrada correctamente.";
    } else {
        echo "Error al registrar la cita.";
    }
}
?>