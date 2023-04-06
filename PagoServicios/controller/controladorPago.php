<?php

require_once '../model/modeloPago.php';



    if(isset($_POST['nombreServicioIn'])){
        $nombreServicioIn = $_POST['nombreServicioIn'];
        $valorPagoIn = $_POST['valorPagoIn'];
        $fechaPagoIn = $_POST['fechaPagoIn'];

        $objPago = new modeloPago(NULL, $nombreServicioIn, $valorPagoIn, $fechaPagoIn);

        $objPago->insertarPago();
        header('location: ../vistas\pagoList.php');
    }

    if(isset($_POST['idPagoUpdate']))
    {
        $idPagoIn = $_POST['idPagoUpdate'];
        $nombreServicioIn = $_POST['nombreServicioUpdate']; 
        $valorPagoIn = $_POST['valorPagoUpdate'];
        $fechaPagoIn = $_POST['fechaPagoUpdate'];

        $objPago = new modeloPago( $idPagoIn, $nombreServicioIn, $valorPagoIn, $fechaPagoIn);

        $objPago->actualizarPago();
        
        header('location: ../vistas/pagoList.php');
    }

    if (isset($_GET['idPagoDelete'])){
        $idPagoIn = $_GET['idPagoDelete'];

        $objPago = new modeloPago ($idPagoIn, NULL, NULL, NULL);
        $objPago ->eliminarPago();

        header('location: ../vistas/pagoList.php');
    }        

?>