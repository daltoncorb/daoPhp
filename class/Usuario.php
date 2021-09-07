<?php
    //require_once("Sql");

    class Usuario{
        private $idusuario;
        private $userLogin;
        private $userPasw;
        private $dataCadastro;


        public function getIdUsuario(){
            return $this->idusuario ;
        }       

        public function setIdUsuario($idusuario){
            $this->idusuario = $idusuario ;
        }       

        public function getUserLogin(){
            return $this->userLogin ;        
        }

        public function setUserLogin( $userlogin){
            $this->userLogin = $userlogin;
        }

        public function getUserPassword(){
            return $this->userPasw ;
        }

        public function setUserPassword($userpasw){
            $this->userPasw = $userpasw ;
        }

        public function getDtCadastro(){
            return $this->dataCadastro ;
        }

        public function setDtCadastro($datacadastro){
            $this->dataCadastro = $datacadastro ;
        }

        public function getUserById($idUser){

            $s = new Sql();
            $res = $s->dSelect("select * from tb_usuarios where idusuario = :id", array(':id' => $idUser));
            if (count($res) > 0 ){
                $row = $res[0];

                $this->setIdUsuario($row['idusuario']);
                $this->setUserLogin($row['userlogin']);
                $this->setUserPassword($row['userpasw']);
                $this->setDtCadastro($row['dtcadastro']);
            }
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

?>