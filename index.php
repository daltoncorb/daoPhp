<?php

    require_once("config.php");

    $consulta = new Sql();
    $res = $consulta->dSelect("select * from tb_usuarios");   

    echo json_encode($res);

?>