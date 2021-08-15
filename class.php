<?php

    class DB extends Mysqli{
        // conection DB data
        private $host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "tropicalisimo_db";

        //Overall data
        private $controller;
        private $method;
        private $data;

        public function __construct($controller, $method, $data){
            $this -> controller = $controller;
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
                    return $this -> add();
                break;
                case 'GET':
                    return $this -> get();
                break;
                case 'PUT':
                    return $this -> update();
                break;
                case 'DELETE':
                    return $this -> delete();
                break;

            } 

        }
        private function add(){
            switch($this -> controller){
                case 'hp':
                    return $this -> add_home_page();
                break;
                case 'tienda':
                    return $this -> add_tienda();
                break;
                case 'galeria':
                    return $this -> add_galeria();
                break;
                case 'carrito':
                    return $this -> add_carrito();
                break;

            }
        }
        private function get(){
            switch($this -> controller){
                case 'hp':
                    return $this -> get_home_page();
                break;
                case 'tienda':
                    return $this -> get_tienda();
                break;
                case 'galeria':
                    return $this -> get_galeria();
                break;
                case 'carrito':
                    return $this -> get_carrito();
                break;

            }
        }
        private function update(){
            switch($this -> controller){
                case 'hp':
                    return $this -> update_home_page();
                break;
                case 'tienda':
                    return $this -> update_tienda();
                break;
                case 'galeria':
                    return $this -> update_galeria();
                break;
                case 'carrito':
                    return $this -> update_carrito();
                break;

            }
        }
        private function delete(){
            switch($this -> controller){
                case 'hp':
                    return $this -> delete_home_page();
                break;
                case 'tienda':
                    return $this -> delete_tienda();
                break;
                case 'galeria':
                    return $this -> delete_galeria();
                break;
                case 'carrito':
                    return $this -> delete_carrito();
                break;

            }
        }


        // ADD BLOCK------------------------------------------------------------------------------------------------

        private function add_home_page(){
            // add PRODUCTS TO HOME PAGE
            $resul[] = 'add PRODUCTS TO HOME PAGE';
            echo json_encode($resul);  
        }
        private function add_tienda(){
            // add PRODUCTS TO TIENDA
            $resul[] = 'add PRODUCTS TO TIENDA';
            echo json_encode($resul);
        }
        private function add_galeria(){
            //add IMG TO GALERIA
            $resul[] = 'add IMG TO GALERIA';
            echo json_encode($resul);
        }
        private function add_carrito(){
            //add PRODUCTS TO CART
            $resul[] = 'add PRODUCTS TO CART';
            echo json_encode($resul);
        }

        // GET BLOCK---------------------------------------------------------------------------------------------------

        private function get_home_page(){
            $resul = $this -> Query("SELECT 
            productos.id_prod, 
            productos.nombre_prod, 
            productos.descripcion_prod,
            productos.precio_prod,
            productos.cantidad_prod
            FROM `home_page_productos` 
            INNER JOIN productos 
            ON productos.id_prod = home_page_productos.id_producto");
            $data = [];
            while($row = mysqli_fetch_array($resul)){
                $producto['id_prod'] = $row['id_prod'];
                $producto['nombre_prod'] = $row['nombre_prod'];
                $producto['descripcion_prod'] = $row['descripcion_prod'];
                $producto['precio_prod'] = $row['precio_prod'];
                $producto['cantidad_prod'] = $row['cantidad_prod'];
                array_push($data, $producto);
            }
            echo json_encode($data);
        }
        private function get_tienda(){
            // get PRODUCTS TO TIENDA
            $resul[] = 'get PRODUCTS TO TIENDA';
            echo json_encode($resul);
        }
        private function get_galeria(){
            //get IMG TO GALERIA
            $resul[] = 'get PRODUCTS TO TIENDA';
            echo json_encode($resul);
        }
        private function get_carrito(){
            //get PRODUCTS TO CART
            $resul[] = 'get PRODUCTS TO CART';
            echo json_encode($resul);
        }

        //UPDATE BLOCK----------------------------------------------------------------------------------------------------

        private function update_home_page(){
            // update PRODUCTS TO HOME PAGE
            $resul[] = 'update PRODUCTS TO HOME PAGE';
            echo json_encode($resul);
        }
        private function update_tienda(){
            // update PRODUCTS TO TIENDA
            $resul[] = 'update PRODUCTS TO TIENDA';
            echo json_encode($resul);
        }
        private function update_galeria(){
            //update IMG TO GALERIA
            $resul[] = 'update IMG TO GALERIA';
            echo json_encode($resul);
        }
        private function update_carrito(){
            //update PRODUCTS TO CART
            $resul[] = 'update PRODUCTS TO CART';
            echo json_encode($resul);
        }

        //DELETE BLOCK----------------------------------------------------------------------------------------------------

        private function delete_home_page(){
            // delete PRODUCTS TO HOME PAGE
            $resul[] = 'delete PRODUCTS TO HOME PAGE';
            echo json_encode($resul);
        }
        private function delete_tienda(){
            // delete PRODUCTS TO TIENDA
            $resul[] = 'delete PRODUCTS TO TIENDA';
            echo json_encode($resul);
        }
        private function delete_galeria(){
            //delete IMG TO GALERIA
            $resul[] = 'delete IMG TO GALERIA';
            echo json_encode($resul);
        }
        private function delete_carrito(){
            //delete PRODUCTS TO CART
            $resul[] = 'delete PRODUCTS TO CART';
            echo json_encode($resul);
        }







    }



    // -----bloques------
    // *Home page products
    // Tienda products by category
    // Galeria
    // Carrito


?>