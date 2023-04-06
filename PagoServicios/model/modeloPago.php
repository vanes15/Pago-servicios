<?php 

require_once 'modeloConexion.php';
class modeloPago extends modeloConexion{
    private $idPago;
    private $nombreServicio;
    private $valorPago;
    private $fechaPago;

function __construct($idPagoIn, $nombreServicioIn, $valorPagoIn, $fechaPagoIn)
        {
            $this->idPago = $idPagoIn;
            $this->nombreServicio = $nombreServicioIn;
            $this->valorPago = $valorPagoIn;
            $this->fechaPago = $fechaPagoIn;
        }

        

        public function insertarPago()
        {
            $conector = new modeloConexion;
            $pdo = $conector::conectar();
            try
            {
                $sql = $pdo->prepare("CALL insertarTipo(?,?,?,?)");

                $sql->execute(array( $this->idPago, $this->nombreServicio, $this->valorPago, $this->fechaPago));

                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."<br/>";
                die();
            }
            
        }


        public function consultarListaPago()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM pago;");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."<br/>";
                
            }
        }

        public function actualizarPago()
        {
            $conector =new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("CALL actualizarPago(?,?,?,?)");
                $sql->execute(array($this->idPago, $this->nombreServicio, $this->valorPago, $this->fechaPago));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error al actualizar: ".$error->getMessage()."<br/>";
            }
        }

        public function consultarXidPago()
        {
            $conector = new modeloConexion();
			$pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM pago WHERE idPago = :idPago;");
                $sql->bindParam(":idPago", $this->idPago);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
            }
        }

        public function eliminarPago(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("Call eliminarPago(?)");
                $sql ->execute(array($this->idPago));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error: " .$error->getMessage(). "</br>";
                die();
            }

    }
}


?>