<?php
    
    session_start();
    
    if(!isset($_SESSION['id_usu'])){
        header("Location: ../../index.php");
    }
    
    $nombre = $_SESSION['nombre'];
    $tipo_usu = $_SESSION['tipo_usu'];
    header("Content-Type: text/html;charset=utf-8");

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
<body >
   	<?php
        include("../../conexion.php");
	    $cod_pro  = $_GET['cod_pro'];
	    if(isset($_GET['cod_pro']))
	    {
	       $sql = mysqli_query($mysqli, "SELECT * FROM productos WHERE cod_pro  = '$cod_pro'");
	       $row = mysqli_fetch_array($sql); 
        }
    ?>

   	<div class="container">
        <center>
            <img src='../../img/logo.png' width="300" height="212" class="responsive">
        </center>
        <BR/>
        <h1><b><i class="fa-solid fa-people-roof"></i> ACTUALIZAR INFORMACIÓN DEL ASESOR</b></h1>
        <p><i><b><font size=3 color=#c68615>*Datos obligatorios</i></b></font></p>
    
        <form action='edititem1.php' enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <div class="row">

                  
                    <input type='hidden' name='cod_pro' class='form-control' id="cod_pro" value='<?php echo $row['cod_pro']; ?>' required />
                   
                    <div class="col-12 col-sm-6">
                        <label for="nom_pro">* NOMBRE:</label>
                        <input type='text' name='nom_pro' id="nom_pro" class='form-control' value='<?php echo $row['nom_pro']; ?>' required style="text-transform:uppercase;" />
                    </div>
                    <div class="col-12 col-sm-3">
                        <label for="precio_prod">* PRECIO:</label>
                        <input type='test' name='precio_prod' id="precio_prod" class='form-control' value='<?php echo $row['precio_prod']; ?>' />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <label for="catg_pro">* CATEGORIA:</label>
                        <select class="form-control" name="catg_pro" required/>  
                            <option value= <?php if($row['catg_pro']==$row['catg_pro']){echo 'selected';} ?>> <?php if($row['catg_pro']==$row['catg_pro']){echo $row['catg_pro'];} ?></option>
                            
                            <?php   
                                $result = mysqli_query($mysqli, "SELECT DISTINCT catg_pro FROM productos");
                                while($row2 = mysqli_fetch_array($result)){ ?>
                                    <option value= <?php if($row2['catg_pro']){echo $row2['catg_pro'];} ?> > <?php if($row2['catg_pro']){echo $row2['catg_pro'];} ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label for="fecha_pro">* FECHA INGRESO:</label>
                        <input type='date' name='fecha_pro' id="fecha_pro" class='form-control' value='<?php echo $row['fecha_pro']; ?>'/>
                    </div>
                </div>
            </div>
  
            <hr style="border: 4px solid #24E924; border-radius: 5px;">
            
            <button type="submit" class="btn btn-outline-warning" name="btn-update">
                <span class="spinner-border spinner-border-sm"></span>
                ACTUALIZAR INFORMACIÓN 
            </button>
            <button type="reset" class="btn btn-outline-dark" role='link' onclick="history.back();" type='reset'><img src='../../img/atras.png' width=27 height=27> REGRESAR
            </button>
        </form>
    </div>
</body>
</html>