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
        <form method="post" action="../controller/controladorPago.php">
            <h2>Datos del pago</h2>
				<form>
					<div class="inputBx">
						<span>Nombre Servicio</span>
						<input type="text" name="nombreServicioIn">
					</div>
					<div class="inputBx">
						<span>Valor Pago</span>
						<input type="number" name="valorPagoIn">
					</div>
                    <div class="inputBx">
						<span>Fecha Pago</span>
						<input type="date" name="fechaPagoIn">
					</div>
					
					<div class="inputBx">
						<input type="submit" value="Registrar pago" name="">
					</div>
          </form>
        </div>
        </div>
        </section>
       </body>
</html>