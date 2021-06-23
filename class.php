<?php

    class DB extends Mysqli{
        // conection DB data
        private $host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "tropicalisimo_db";

        //Overall data
        private $method;
        private $data;

        public function __construct($method, $data){
            $this -> method = $method;
            $this -> $data = $data;
            parent:: __construct(
                $this -> host,
                $this -> db_user,
                $this -> db_pass,
                $this -> db_name
            );

            switch($this -> method){
                case 'POST':
                   echo( $this -> add());
                break;
                case 'GET':
                   echo $this -> get();
                break;
                case 'PUT':
                   echo $this -> update();
                break;
                case 'DELETE':
                   echo $this -> delete();
                break;
            } 

        }
        private function add(){
            $resul['message'] = "ADD works!";
            return json_encode($resul);
        }
        private function get(){
            $resul['message'] = "GET works!";
            return json_encode($resul);
        }
        private function update(){
            $resul['message'] = "UPDATE works!";
            return json_encode($resul);
        }
        private function delete(){
            $resul['message'] = "DELETE works!";
            return json_encode($resul);
        }


    }

?>