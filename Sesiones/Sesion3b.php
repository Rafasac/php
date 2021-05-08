<?
$usuariook = 'pedro';
$passok = 'abcd';

if ($_POST['nombre'] == $usuariook && $_POST['pass'] == $passok) {
	session_start();
	$_SESSION["verificado"] = "si";
	echo "Tienes acceso a la página privada";
	echo "<a href='sesion3c.php'>Ve a ver el contenido privado!!</a>";
} else {
	header ("Location: sesion3a.php?error=si");
}

?>