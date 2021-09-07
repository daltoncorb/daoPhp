<?php

    class Sql extends PDO{
        private $conn;

        //faz a conexao 
        public function __construct(){
            $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");            
        }

        //vai definir se a query vai usar varios parametros
        private function setParams($statment, $params = array()){
            foreach ($params as $key => $value) {
                $this->setParam($statment, $key, $value);
            }
        }

        private function setParam($statment, $key, $value){
            $statment->bindParam($key, $value);
        }


        public function dQuery($rawQuery, $params = array()){
            $statment = $this->conn->prepare($rawQuery);
            $this->setParams($statment, $params);
            $statment->execute();
            return $statment;
        }

        public function dSelect($rawQuery, $params = array()){
            $fetc = $this->dQuery($rawQuery, $params);
            $res = $fetc->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
          
        
    }

?>