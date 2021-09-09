<?php
//require_once("Sql");

class Usuario
{
    private $idUsuario;
    private $userLogin;
    private $userPasw;
    private $dataCadastro;


    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idusuario)
    {
        $this->idUsuario = $idusuario;
    }

    public function getUserLogin()
    {
        return $this->userLogin;
    }

    public function setUserLogin($userlogin)
    {
        $this->userLogin = $userlogin;
    }

    public function getUserPassword()
    {
        return $this->userPasw;
    }

    public function setUserPassword($userpasw)
    {
        $this->userPasw = $userpasw;
    }

    public function getDtCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDtCadastro($datacadastro)
    {
        $this->dataCadastro = $datacadastro;
    }

    private function setData($data ){

        $this->setIdUsuario($data['idusuario']);
        $this->setUserLogin($data['userlogin']);
        $this->setUserPassword($data['userpasw']);
        $this->setDtCadastro(date_format(new DateTime($data['dtcadastro']), 'd/m/Y'));        
    }

    public function getUserById($idUser)
    {

        $s = new Sql();
        $res = $s->dSelect("select * from tb_usuarios where idusuario = :id", array(':id' => $idUser));

        if (count($res) > 0) {
            $row = $res[0];
            $this->setData($row);
            // $this->setIdUsuario($row['idusuario']);
            // $this->setUserLogin($row['userlogin']);
            // $this->setUserPassword($row['userpasw']);
            // $this->setDtCadastro(date_format(new DateTime($row['dtcadastro']), 'd/m/Y'));
        }
    }

    public static function listaUsers()
    {
        $sql = new Sql();

        $res = $sql->dSelect("select * from tb_usuarios order by userlogin asc");
        return json_encode($res);
    }

    public static function searchLogin($login)
    {
        $sql = new Sql();

        $res = $sql->dSelect("select * from tb_usuarios where (userlogin like :search) order by userlogin asc", array(":search" => "%" . $login . "%"));
        return json_encode($res);
    }


    public function getUserByLoginAndPass($idUser, $idpass)
    {

        $s = new Sql();
        $res = $s->dSelect("select * from tb_usuarios where userlogin = :login and userpasw = :pass", 
                        array(':login' => $idUser, ":pass" => $idpass));

        if (count($res) > 0) {
            $row = $res[0];
            $this->setData($row);

            // $this->setIdUsuario($row['idusuario']);
            // $this->setUserLogin($row['userlogin']);
            // $this->setUserPassword($row['userpasw']);
            // $this->setDtCadastro(date_format(new DateTime($row['dtcadastro']), 'd/m/Y'));
        } else
            throw new Exception("Usuário não localizado !", 1);
    }

    public function insertUser()
    {
        $sql = new Sql();
        $res = $sql->dSelect("CALL sp_usuario_cadastro(:login, :pass)", 
                        array(":login" => $this->getUserLogin(), ":pass" => $this->getUserPassword()));

        if(count($res) > 0){
            return json_encode($res);
        } else 
            throw new Exception("Erro ao tentar registrar um usuário!", 1);
                                  
    }

    public function updateUser($newLogin, $newPass, $key){
        $sql = new Sql();

        $sql->dQuery("update tb_usuarios set userlogin = :newlog, userpasw = :newpas where idusuario = :id", 
                  array(":newlog" => $newLogin, ":newpas" => $newPass, "id" => $key));
    }

    public function deleteUser($idDelete){
        $sql = new Sql();

        $sql->dQuery("delete from tb_usuarios where idusuario = :id", array(":id" => $idDelete));
        $res = $sql;
        var_dump($res);
    }

    public function __toString()
    {
        return json_encode(array(
            "idUsuario" => $this->getIdUsuario(),
            "userLogin" => $this->getUserLogin(),
            "userPasw" => $this->getUserPassword(),
            "dtCadastro" => $this->getDtCadastro()
        ));
    }
}
