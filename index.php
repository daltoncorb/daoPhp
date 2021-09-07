<?php

    require_once("config.php");

    $classe = new Sql();
    $res = $classe->dSelect("select * from tb_usuarios");   

    echo json_encode($res);

?>