<?php
    include_once '../model/modeloConexion.php';
    session_start();

    if(isset($_GET['cerrar sesion'])){
        session_unset();

        session_destroy();
    }

    if(isset($_SESSION['tipoU'])){
        switch($_SESSION['tipoU']){
            case 1;
            break;
            header('location: usuarios/cliente/index.php');

            case 3;
            break;
            header('location: usuarios/admin/index.php');

            case 2;
            break;
            header('location: usuarios/empresa/index.php');

            default: 
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new modeloConexion();
        $query = $db->conectar()->prepare('SELECT*FROM usuarios Where username = :username AND password = :password');
        $query->execute(['username'=>$username, 'password'=>$password]);
        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            $rol = $row[5];
            $_SESSION['rol'] =$rol;
            switch($_SESSION['tipoU']){
                case 1;
                break;
                header('location: usuarios/cliente/index.php');
    
                case 3;
                break;
                header('location: usuarios/admin/index.php');
    
                case 2;
                break;
                header('location: usuarios/empresa/index.php');
    
                default: 
            }

        }else {
            echo "el usuario o contraseña son invalidos";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../resource/css/login.css">
	<title>Login</title>
</head>
<body>
		<section>
			


			<div class="contentBx">
				<div class="formBx">
				<a class="backBtn fa fa-chevron-left" href="index.html"></a>
				<h2>Ingresar</h2>
				<form action="" method="POST">
					<div class="inputBx">
						<span>Usuario</span>
						<input type="text" name="username">
					</div>
					<div class="inputBx">
						<span>Contraseña</span>
						<input type="password" name="password">
					</div>
					<div class="remember">
						<label><input type="checkbox" name=""> Recordarme</label>
					</div>
					<div class="inputBx">
						<input type="submit" value="Ingresar" name="">
					</div>

					<div class="inputBx">
						<p>Olvidó su contraseña?<a href="#"> Restaurar</a></p>
					</div>

				</form>
				<h3>Ingrese con redes sociales</h3>
				<ul class="sci">
					<li><img src="../resource/img/instagram.png"></li>
					<li><img src="../resource/img/facebook.png"></li>
					<li><img src="../resource/img/instagram.png"></li>
				</ul>
			</div>
			</div>
			
		</section>
</body>