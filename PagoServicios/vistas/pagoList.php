<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\resource\css\tListas.css">
    <title>Lista Pagos</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Id Pago</th>
            <th>Nombre Servicio</th>
            <th>Valor Pago</th>
            <th>Fecha Pago</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
                <?php
                    require_once '../model/modeloPago.php';
                        $objPago = new modeloPago(NULL,NULL,NULL,NULL);
                        $consultaPago = $objPago->consultarListaPago();
                ?>
                    <tr>
                        <?php foreach ($consultaPago as $tablaPago): ?>
                        <td><?php echo $tablaPago->idPago?></td>
                        <td><?php echo $tablaPago->nombreServicio ?></td>
                        <td><?php echo $tablaPago->valorPago ?></td>
                        <td><?php echo $tablaPago->fechaPago ?></td>
        
                        <td> 
                            <button onclick="location.href ='actualizarPago.php?idPagoUpdate=<?php echo $tablaPago->idPago?> '">Actualizar</button>
                            <button onclick="location.href ='../controller/controladorPago.php?idPagoDelete=<?php echo $tablaPago->idPago ?>'">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach ?>      
        </tbody>
    </table>
</body>
</html>