<?php
    class modeloConexion{
        private $dbHost = "localhost";
        private $dbName = "pagoServicio";
        private $dbUser = "root";
        private $dbUserPass = "";

        public function conectar()
        {
            $pdo = new PDO('mysql:host=' .$this->dbHost.';dbname='.$this->dbName.';charset=utf8',$this->dbUser ,$this->dbUserPass);
            $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>
