<?php 
require('../../conexion.php');
sleep(1);
if (isset($_POST)) {
    $cod_pro = (string)$_POST['cod_pro'];
    
    $result = $mysqli->query(
        'SELECT * FROM productos WHERE cod_pro = "'.strtolower($cod_pro).'"'
    );
    
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger"><strong>VERIFICA EL NUMERO DE CC y/o NIT!</strong> Ya existe uno igual.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>ES NUEVO REGISTRO!</strong> El asesor no está registrad@.</div>';
    }
}