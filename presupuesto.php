<?php
$logoPath = $_SERVER['DOCUMENT_ROOT'].'/egpTrade-Modif/assets/img/logo_p.png';
$logoBase64 = base64_encode(file_get_contents($logoPath));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resultado_gravamenes = (float)($_POST['res_gravamenes'] ?? 0);
    $resultado_sinH = (float)($_POST['res_sinH'] ?? 0);
    $resultado_conH = (float)($_POST['res_conH'] ?? 0);

    $honorario = (float)($_POST['honorario'] ?? 0);
    $gasto_op = (float)($_POST['gasto_op'] ?? 0);
    $senasa = (float)($_POST['senasa'] ?? 0);
    $dig = (float)($_POST['dig'] ?? 0);

    $fob =(float)($_POST['res_fob'] ?? 0);  
    $flete =(float)($_POST['res_flete'] ?? 0);
    $seguro =(float)($_POST['res_seguro'] ?? 0);

    $cif = (float)($_POST['res_cif'] ?? 0);
    $derechos = (float)($_POST['res_derechos'] ?? 0);
    $estadistica = (float)($_POST['res_estadistica'] ?? 0);
    $baseIVA = (float)($_POST['res_base_iva'] ?? 0);
    $iva = (float)($_POST['res_iva'] ?? 0);
    $ivaAdic = (float)($_POST['res_iva_adic'] ?? 0);
    $ganancia = (float)($_POST['res_ganancia'] ?? 0);
    $ib = (float)($_POST['res_ib'] ?? 0);
    $arancel = (float)($_POST['res_arancel'] ?? 0);

    $fecha = $_POST['fecha'] ?? '';
    $cliente = $_POST['cliente'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $email = $_POST['email'] ?? '';
    $observacion = $_POST['obs'] ?? '';

    $validez = 15;
}

function obtenerNumeroPresupuesto() {
    $archivo = 'nro_presupuesto.txt';
    if (!file_exists($archivo)) {
        file_put_contents($archivo, '1');
        return 1;
    } else {
        $numero = (int)file_get_contents($archivo);
        $numero++;
        file_put_contents($archivo, (string)$numero);
        return $numero;
    }
}

$numero_presupuesto = obtenerNumeroPresupuesto();
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Presupuesto</title>
</head>

<body style="font-family: Helvetica, Arial, sans-serif; color: #333; background: #fff; padding: 20px;">

  <!-- Encabezado -->
  <table width="100%">
    <tr>
      <td align="left" valign="top">
        <img src="data:image/png;base64,<?php echo $logoBase64; ?>" width="180">
        <p style="margin:0; font-size: 12px;">CUIT: 23-21629784-9</p>
      </td>
      <td align="right" valign="top">
        <h2 style="margin:0; font-weight: 500;">PRESUPUESTO</h2>
        <p style="margin:0; font-size: 13px;">Fecha: <?php echo $fecha; ?></p>
        <p style="margin:0; font-size: 13px;">Presupuesto N°: <?php echo str_pad($numero_presupuesto, 5, "0", STR_PAD_LEFT); ?></p>
        <p style="margin:0; font-size: 13px;">Validez: <?php echo $validez; ?> días</p>
      </td>
    </tr>
  </table>

  <hr style="margin:10px 0;">

  <!-- Cliente / Pago -->
  <table width="100%" style="margin-top: 10px; font-size: 13px;">
    <tr>
      <td valign="top">
        <strong style="color: #012970;">CLIENTE</strong><br>
        <strong><?php echo $cliente; ?></strong><br>
        <strong>Tel:</strong> <?php echo $telefono; ?><br>
        <strong>Email:</strong> <?php echo $email; ?>
      </td>
      <td align="right" valign="top">
        <strong style="color: #012970;">DATOS DE PAGO</strong><br>
        Cuenta: XXXXX<br>
        EGP Comercio Exterior
      </td>
    </tr>
  </table>

  <!-- Montos Imponibles -->
  <table width="100%" border="1" cellspacing="0" cellpadding="6" style="margin-top: 10px; border-collapse: collapse; font-size: 13px;">
    <tr style="background: #012970; color: #fff;">
      <th align="left">Concepto</th>
      <th align="right">Importe</th>
    </tr>
    <?php if (!empty($cif)) : ?>
      <tr><td>CIF</td><td align="right">USD <?php echo number_format($cif, 2, ',', '.'); ?></td></tr>
    <?php endif; ?>
    <?php if (!empty($fob)) : ?>
      <tr><td>FOB</td><td align="right">USD <?php echo number_format($fob, 2, ',', '.'); ?></td></tr>
    <?php endif; ?>
    <?php if (!empty($flete)) : ?>
      <tr><td>FLETE</td><td align="right">USD <?php echo number_format($flete, 2, ',', '.'); ?></td></tr>
    <?php endif; ?>
    <?php if (!empty($seguro)) : ?>
      <tr><td>SEGURO</td><td align="right">USD <?php echo number_format($seguro, 2, ',', '.'); ?></td></tr>
    <?php endif; ?>
    <?php if (!empty($baseIVA)) : ?>
      <tr><td>Base de IVA</td><td align="right">USD <?php echo number_format($baseIVA, 2, ',', '.'); ?></td></tr>
    <?php endif; ?>
  </table>

  <!-- Detalle de gravámenes -->
  <?php if (!empty($resultado_gravamenes)) : ?>
  <table width="100%" border="1" cellspacing="0" cellpadding="6" style="margin-top: 10px; border-collapse: collapse; font-size: 13px;">
    <tr style="background: #012970; color: #fff;">
      <th align="left">Detalle</th>
      <th align="right">Importe</th>
    </tr>
    <tr><td>IVA</td><td align="right">USD <?php echo number_format($iva, 2, ',', '.'); ?></td></tr>
    <tr><td>IVA Adicional</td><td align="right">USD <?php echo number_format($ivaAdic, 2, ',', '.'); ?></td></tr>
    <tr><td>Percepción Ganancias</td><td align="right">USD <?php echo number_format($ganancia, 2, ',', '.'); ?></td></tr>
    <tr><td>Percepción IIBB</td><td align="right">USD <?php echo number_format($ib, 2, ',', '.'); ?></td></tr>
    <tr><td>Arancel SIM</td><td align="right">USD <?php echo number_format($arancel, 2, ',', '.'); ?></td></tr>
    <tr><td>Derechos de Importación</td><td align="right">USD <?php echo number_format($derechos, 2, ',', '.'); ?></td></tr>
    <tr><td>Tasa Estadística</td><td align="right">USD <?php echo number_format($estadistica, 2, ',', '.'); ?></td></tr>
    <tr><td><strong>Total de gravámenes</strong></td><td align="right"><strong>USD <?php echo number_format($resultado_gravamenes, 2, ',', '.'); ?></strong></td></tr>
  </table>
  <?php endif; ?>

  <!-- Totales -->
  <?php if (!empty($resultado_sinH)) : ?>
    <p style="font-size: 12px; margin-top:10px;"><strong>Total sin honorarios:</strong> USD <?php echo number_format($resultado_sinH, 2, ',', '.'); ?></p>
  <?php endif; ?>

  <?php if (!empty($resultado_conH)) : ?>
  <table width="100%" border="1" cellspacing="0" cellpadding="6" style="margin-top: 10px; border-collapse: collapse; font-size: 13px;">
    <tr style="background: #012970; color: #fff;">
      <th align="left">Honorarios del Despachante</th>
      <th align="right">Importe</th>
    </tr>
    <tr><td>Honorarios</td><td align="right">USD <?php echo number_format($honorario, 2, ',', '.'); ?></td></tr>
    <tr><td>Gastos operativos</td><td align="right">USD <?php echo number_format($gasto_op, 2, ',', '.'); ?></td></tr>
    <tr><td>SENASA</td><td align="right">USD <?php echo number_format($senasa, 2, ',', '.'); ?></td></tr>
    <tr><td>Digitalización</td><td align="right">USD <?php echo number_format($dig, 2, ',', '.'); ?></td></tr>
    <tr><td><strong>Total con honorarios</strong></td><td align="right"><strong>USD <?php echo number_format($resultado_conH, 2, ',', '.'); ?></strong></td></tr>
  </table>
  <?php endif; ?>

  <!-- Observaciones -->
  <table width="100%" style="margin-top: 15px; font-size: 13px;">
    <tr>
      <td width="50%">
        <strong style="color: #012970;">OBSERVACIONES</strong>
        <p><?php echo $observacion; ?></p>
      </td>
    </tr>
  </table>

  <!-- Footer -->
  <div style="text-align: center; margin-top: 15px;">
    <span style="background: #012970; color: #fff; padding: 8px 16px; font-weight: 200;">
      info@epereira.com.ar | Tel: 341-4026621 | Cordoba 955, Rosario
    </span>
  </div>

</body>
</html>

<?php
$html = ob_get_clean();

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'Helvetica');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream('presupuesto.pdf', array('Attachment' => false));
?>
