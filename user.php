<div>
    <h1>1.a | Modelado OO</h1>
</div>
<?php
// Definir base de datos a utilizar y credenciales
define('DB_HOST', 'localhost'); //localhost dado ambiente xampp local
define('DB_NAME', 'persiscal_moodle'); //nomenclatura asignada en la pregunta 1.a
define('DB_USER', 'root'); //root dado ambiente xampp local
define('DB_PASS', ''); //null dado ambiente xampp local
define('DB_CHAR', 'utf8');

// clase
require_once 'database.php';

class USER
{
    //Propiedades USER
	var $id;
    var $nombre;
    var $apellido;
    var $email;
	var $description;
	var $timemodified;
 
    //Constructor de clase
    function __construct($id, $nombre, $apellido, $email, $description, $timemodified)
    {
        //Asignación $this de parametros enviados
        $this->id        	= $id;
		$this->nombre       = $nombre;
        $this->apellido     = $apellido;
        $this->email        = $email;
        $this->description  = $description;
        $this->timemodified = $timemodified;
    }
 
    //Método Tipo get concatenado
    function NombreCompleto()
    {
        return $this->nombre . " " . $this->apellido;
    }
	//Métodos simples
	function Descripcion()
    {
        return $this->nombre;
    }
	function Email()
    {
        return $this->email;
    }
	function timeModified()
    {
        return $this->timeModified;
    }
 
}

//INICIO TEST AISLADO
$id=rand(1,100); //test random id

echo "Prueba de ID usuario aleatorio: {$id}<br>";
echo "<br><br>Array asociativo:<br>";
$user = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC); //Array asociativo
var_dump($user);

echo "<br><br>Objeto y propiedades:<br>";
$user = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch(PDO::FETCH_OBJ); //Objeto y propiedades
var_dump($user);

echo "<br><br>JSON DATA:<br>";
$user = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC); //JSON
$user = json_encode($user);
var_dump($user);
//FIN TEST AISLADO


//Prueba de Objeto USER final
echo "<br><br>Resultado  USER:<br>";
$user = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);
$user_test = new USER($user['id'],$user['nombre'],$user['apellido'],$user['email'],$user['description'],$user['timemodified']);

var_dump($user_test);

//Prueba metodo Tipo
echo "<br><br>Prueba Metodo NombreCompleto clase USER<br>";
echo $user_test->NombreCompleto();