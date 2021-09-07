<?php

    require_once("config.php");

    // $consulta = new Sql();
    // $res = $consulta->dSelect("select * from tb_usuarios");   

    // echo json_encode($res);

    $usuario = new Usuario();
    $usuario->getUserById(4);
    //echo $usuario->getUserLogin() . ' - ' . $$usuario->getUserPassword() . " - " . $usuario->getDtCadastro();
    echo $usuario ;

?>