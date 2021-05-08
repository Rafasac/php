<?
session_start();
if(isset($_SESSION['verificado'])){
	echo "Esta es tu página privada";
} else {
	header ("Location: sesion3a.php?error=fuera");
}
?>