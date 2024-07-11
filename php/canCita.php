<?php
// Conexión a la base de datos
function Conectarse()
{
    $conexion = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    return $conexion;
}

// Clase para manejar la cancelación de citas
class CancelarCita
{
    private $paciente_nombre;
    private $paciente_apellidos;
    private $medico_nombre;
    private $medico_especialidad;
    private $fecha;
    private $hora;
    private $motivo_cancelacion;
    private $Conexion;

    public function __construct($paciente_nombre, $paciente_apellidos, $medico_nombre, $medico_especialidad, $fecha, $hora, $motivo_cancelacion)
    {
        $this->paciente_nombre = $paciente_nombre;
        $this->paciente_apellidos = $paciente_apellidos;
        $this->medico_nombre = $medico_nombre;
        $this->medico_especialidad = $medico_especialidad;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->motivo_cancelacion = $motivo_cancelacion;
    }

    public function cancelarCita()
    {
        $this->Conexion = Conectarse();
        $sql = "DELETE FROM citas WHERE paciente_nombre='$this->paciente_nombre' AND paciente_apellidos='$this->paciente_apellidos' AND medico_nombre='$this->medico_nombre' AND medico_especialidad='$this->medico_especialidad' AND fecha='$this->fecha' AND hora='$this->hora'";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_nombre = $_POST['paciente_nombre'];
    $paciente_apellidos = $_POST['paciente_apellidos'];
    $medico_nombre = $_POST['medico_nombre'];
    $medico_especialidad = $_POST['medico_especialidad'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $motivo_cancelacion = $_POST['motivo_cancelacion'];

    $cancelarCita = new CancelarCita($paciente_nombre, $paciente_apellidos, $medico_nombre, $medico_especialidad, $fecha, $hora, $motivo_cancelacion);
    if ($cancelarCita->cancelarCita()) {
        echo "Cita cancelada exitosamente.";
    } else {
        echo "Error al cancelar la cita.";
    }
}
?>
