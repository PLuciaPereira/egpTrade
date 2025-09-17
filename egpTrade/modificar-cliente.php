<?php
include("conexion.php");

$id_cliente=$_POST["nroCliente"];
$razonSocial= isset($_POST['razonSocial']) ? $_POST['razonSocial'] : '';
$domicilioFiscal = isset($_POST['domicilioFiscal']) ? $_POST['domicilioFiscal'] : '';
$nroDomicilio= isset($_POST["numero"]) ? $_POST["numero"]: '';
$piso= isset($_POST["piso"]) ? $_POST["piso"]: '';
$depto=isset($_POST["departamento"]) ? $_POST["departamento"]: '';
$localidad= isset($_POST["localidad"]) ? $_POST["localidad"]: '';
$provincia= isset($_POST["provincia"]) ? $_POST["provincia"]: '';
$codigoPostal= isset($_POST["codigoPostal"]) ? $_POST["codigoPostal"]: '';
$telefono= isset($_POST["telefono"]) ? $_POST["telefono"]: '';
$email= isset($_POST["email"]) ? $_POST["email"]: '';
$cuit= isset($_POST["cuit"]) ? $_POST["cuit"]: '';
$condIva= isset($_POST["condicion_id"]) ? $_POST["condicion_id"]: '';

  
$consulta= "UPDATE clienteprueba SET razonSocial='$razonSocial', domicilioFiscal='$domicilioFiscal', numero='$nroDomicilio', piso= '$piso', departamento='$depto', localidad='$localidad', provincia='$provincia', codigoPostal='$codigoPostal', telefono='$telefono', email='$email', cuit='$cuit', condicion_id='$condIva' WHERE nroCliente='$id_cliente'";
$query=mysqli_query($conexion,$consulta);

if ($query) {
    header("Location: listado-clientes.php");
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
    echo "Consulta ejecutada: " . $consulta;
}
?>