
Copiar código
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
2. Crear la clase Usuario y manejar el formulario
El archivo que manejará el formulario de registro de usuarios (registrar_usuario.php) debe tener el siguiente código:

php
Copiar código
<?php
// Asegúrate de que se haya definido una conexión a la base de datos
include 'db_conexion.php';

class Usuario
{
    private $id;
    private $usuario;
    private $password;
    private $estado;
    private $rol;
    private $Conexion;

    // Constructor
    public function __construct($id, $usuario, $password, $estado, $rol)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->estado = $estado;
        $this->rol = $rol;
    }

    // Métodos Accesores y Modificadores
    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setUsuario($usuario) { $this->usuario = $usuario; }
    public function getUsuario() { return $this->usuario; }

    public function setPassword($password) { $this->password = $password; }
    public function getPassword() { return $this->password; }

    public function setEstado($estado) { $this->estado = $estado; }
    public function getEstado() { return $this->estado; }

    public function setRol($rol) { $this->rol = $rol; }
    public function getRol() { return $this->rol; }

    // Método para guardar la información del formulario
    public function guardarUsuario()
    {
        $this->Conexion = Conectarse();
        $sql = "INSERT INTO usuarios (id, usuario, password, estado, rol) 
                VALUES ('$this->id', '$this->usuario', '$this->password', '$this->estado', '$this->rol')";
        $resultado = $this->Conexion->query($sql);
        $this->Conexion->close();
        return $resultado;
    }
}

// Manejo del formulario de registro de usuario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];
    $rol = $_POST['rol'];

    $usuarioObj = new Usuario($id, $usuario, $password, $estado, $rol);
    if ($usuarioObj->guardarUsuario()) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>