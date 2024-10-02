<?php

    date_default_timezone_set("America/Bogota");
    session_start();
    
    if(!isset($_SESSION['id_usu'])){
        header("Location: ../../index.php");
    }
    
    $nombre = $_SESSION['nombre'];
    $tipo_usu = $_SESSION['tipo_usu'];


    include("../../conexion.php");
    if(isset($_POST['codigoB']))
    {
               
        $cod_pro         =   $_POST['codigoB'];
        $fecha_edit_pro  =   (date('Y-m-d h:i:s'));
        $id_usu_edit     =   $_SESSION['id_usu'];
        $estado_prod     =   0;
                
        $update = "UPDATE productos SET estado_prod ='".$estado_prod."', id_usu_edit ='".$id_usu_edit."', fecha_edit_pro ='".$fecha_edit_pro."' WHERE cod_pro='".$cod_pro."'";

        $up = mysqli_query($mysqli, $update);
        echo "<script language='javascript'>";
        echo "alert('Error!! Torna a identificar-te. Les dades no són correctes.')";
        echo "</script>"; 
        $url='showitem.php';
        header ("Location: ".$url."");
            

    }else{
        echo "ocurrio un error comuniquese con el administrador";
    }
?>

