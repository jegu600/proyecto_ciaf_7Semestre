<?php

    date_default_timezone_set("America/Bogota");
    session_start();
    
    if(!isset($_SESSION['id_usu'])){
        header("Location: ../../index.php");
    }
    
    $nombre = $_SESSION['nombre'];
    $tipo_usu = $_SESSION['tipo_usu'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VISION | SOFT</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fed2435e21.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <!-- Using Select2 from a CDN-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .responsive {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

   	<?php
        include("../../conexion.php");
        header("Content-Type: text/html;charset=utf-8");
	    if(isset($_POST['btn-update']))
        {

            $cod_pro         =   $_POST['cod_pro'];
            $nom_pro         =   mb_strtoupper($_POST['nom_pro']);
            $precio_prod     =   $_POST['precio_prod'];
            $catg_pro        =   $_POST['catg_pro'];
            $fecha_pro       =   $_POST['fecha_pro'];
            $fecha_edit_pro  =   (date('Y-m-d h:i:s'));
            $id_usu_edit     =   $_SESSION['id_usu'];
          
           
            $update = "UPDATE productos SET cod_pro ='".$cod_pro."', nom_pro='".$nom_pro."', precio_prod ='".$precio_prod."', catg_pro='".$catg_pro."',  fecha_pro ='".$fecha_pro."', fecha_edit_pro ='".$fecha_edit_pro."', id_usu_edit ='".$id_usu_edit."' WHERE cod_pro='".$cod_pro."'";

            $up = mysqli_query($mysqli, $update);

            echo "
                <!DOCTYPE html>
                    <html lang='es'>
                        <head>
                            <meta charset='utf-8' />
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                            <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
                            <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet'>
                            <link rel='stylesheet' href='../../css/bootstrap.min.css'>
                            <link href='../../fontawesome/css/all.css' rel='stylesheet'>
                            <title>VISION | SOFT</title>
                            <style>
                                .responsive {
                                    max-width: 100%;
                                    height: auto;
                                }
                            </style>
                        </head>
                        <body>
                            <center>
                                <img src='../../img/logo.png' width=300 height=212 class='responsive'>
                                <div class='container'>
                                <br />
                                    <h3><b><i class='fa-solid fa-people-roof'></i> SE ACTUALIZÓ DE FORMA EXITOSA EL REGISTRO</b></h3><br />
                                <p align='center'><a href='showitem.php'><img src='../../img/atras.png' width=96 height=96></a></p>
                            </div>
                            </center>
                        </body>
                    </html>
        ";
        }
    ?>

</body>
</html>