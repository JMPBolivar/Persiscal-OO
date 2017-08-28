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

/* usos directos a datos de la tabla
Selección

--Todo
$all = DB::run("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
var_export($all);

--Por id
$id  = 50;
$row = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch();
var_export($row);

--Por loop
$stmt = DB::run("SELECT * FROM users");
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo $row['id']," ",$row['nombre']," ",$row['apellido']," ",$row['email']," ",$row['timemodified'],"<br>"; // disponible ($row->nombre); o ($row[1]);
}

-- Para campo (nombre,apellido,email)
$campo = DB::run("SELECT nombre FROM users WHERE id=?", [$id])->fetchColumn();
var_dump($campo);

Actualización

$aux = 'Sue';
$stmt = DB::run("UPDATE users SET nombre=? WHERE id=?", [$aux, $id]);
var_dump($stmt->rowCount());

*/

//asumiendo el id, solicitar info
$id  = 50;

// info * array de la fila
$row = DB::run("SELECT * FROM users WHERE id=?", [$id])->fetch();
var_export($row);

echo '<br><br>';
// seleccionar campo especifico
$col ='nombre'; //nombre, apellido, email
$campo = DB::run("SELECT {$col} FROM users WHERE id=?", [$id])->fetchColumn();
var_dump($campo);

echo '<br><br>';
// Presentacion de tabla en loop
$stmt = DB::run("SELECT * FROM users");
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo $row['id']," ",$row['nombre']," ",$row['apellido']," ",$row['email']," ",$row['description']," ",$row['timemodified'],"<br>"; // disponible ($row->nombre); o ($row[1]);
}