<?php

    require_once("config.php");

    // $consulta = new Sql();
    // $res = $consulta->dSelect("select * from tb_usuarios");   

    // echo json_encode($res);

    //$usuario = new Usuario();
    //retorna somente um usuário
    //$usuario->getUserById(1);
    // echo "<br>" . $usuario->getUserLogin() ;
    // echo "<br>" . $usuario->getUserPassword() ;
    // echo "<br>" . $usuario->getIdUsuario() ;
    // echo "<br>" . $usuario->getDtCadastro() ;
    //echo $usuario ;
    
    //$u = new Usuario();
    //metodo e estatico;
    //$resultado = Usuario::listaUsers();
    //echo $resultado;

    //echo "-------------searchlogin static--------------" ;
    //$res = Usuario::searchLogin("ar");
    //echo $res;

    //ususario por senha e login sem ser estático
    $u = new Usuario();
    //$res = $u->getUserByLoginAndPass('dalton', '123456');
    //echo "<br>" . $u->getUserLogin() ;
    //echo "<br>" . $u->getUserPassword() ;
    //echo $u;
    //$res = $u->getUserByLoginAndPass('ricardo', '225635');

    $u->setUserLogin("bastard");
    $u->setUserPassword("332255");
    $r = $u->insertUser();
    echo $r;

    $u->updateUser("newBastard", "325689", 10);

    $u->deleteUser(12);

?>