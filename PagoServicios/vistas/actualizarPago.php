<?php
        //error_reporting(E_ERROR | E_PARSE);
        require_once '../model/modeloPago.php';
        if(empty($_GET['idPagoUpdate'])){
            header('location :  pagoList.php');
        }
        else{
            $idPago = $_GET['idPagoUpdate'];
            $objPago = new modeloPago($idPago, null, null, null);

            $consultaPago = $objPago->consultarXidPago();
            $countPago = count(array($consultaPago));
            if($countPago == 0){
                header('location: pagoList.php');
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pago de servicios en linea</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../resource\css\index.css">
    </head>

    <body>
        <section>
        <div class="contentBx">
        <div class="formBx">
            <h2>Actualización de pago de servicios</h2>
            <form method="post" action="../controller/controladorPago.php">
                <div class="inputBx">
                    <input type="hidden" name="idPagoUpdate" value="<?php echo $consultaPago->idPago ?>"></br>
                    <span>Nombre Servicio</span>
                    <input type="text" name="nombreServicioUpdate" value="<?php echo $consultaPago->nombreServicio; ?>"></br>
                    <span>Valor Pago</span>
                    <input type="number" name="valorPagoUpdate" value="<?php echo $consultaPago->valorPago; ?>"></br>
                    <span>fecha Pago</span>
                    <input type="date" name="fechaPagoUpdate" value="<?php echo $consultaPago->fechaPago; ?>"></br>
                </div>
				<div class="inputBx">
					<input type="submit" value="Actualizar" name="">
				</div>
          </form>
        </div>
        </div>
        </section>
       </body>
</html>