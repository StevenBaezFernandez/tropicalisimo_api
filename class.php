<?php

    class DB extends Mysqli{
        // conection DB data
        private $host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "tropicalisimo_db";

        //Overall data
        private $controller;
        private $categoria;
        private $id;
        private $method;
        private $data;

        public function __construct(
            $controller, 
            $categoria = false, 
            $id = false, 
            $method, 
            $data){

            $this -> controller = $controller;
            $this -> categoria = $categoria;
            $this -> id = $id;
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
                case 'categoria':
                    return $this -> get_categoria();
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
            productos.cantidad_prod,
            imagen_producto.url_img
            FROM home_page_productos 
            INNER JOIN productos 
            ON productos.id_prod = home_page_productos.id_producto
            INNER JOIN imagen_producto
            ON  imagen_producto.id_prod_img = productos.id_prod");
            $data = [];
            while($row = mysqli_fetch_array($resul)){
                $producto['id_prod'] = $row['id_prod'];
                $producto['nombre_prod'] = $row['nombre_prod'];
                $producto['descripcion_prod'] = $row['descripcion_prod'];
                $producto['precio_prod'] = $row['precio_prod'];
                $producto['cantidad_prod'] = $row['cantidad_prod'];
                $resul_img_prod = $this -> Query("SELECT * FROM imagen_producto WHERE id_prod_img = '".$producto['id_prod']."'");
                $img_prod = [];
                while($row = mysqli_fetch_array($resul_img_prod)){
                    $img['url_img'] = $row['url_img'];
                    array_push($img_prod, $img);
                }
                $producto['imgs'] = $img_prod;
                array_push($data, $producto);
            }
            echo json_encode($data);
        }
        private function get_tienda(){
           if($this -> id){
            $resul = $this -> Query("SELECT 
            id_prod, 
            nombre_prod, 
            descripcion_prod, 
            precio_prod, 
            cantidad_prod 
            FROM productos 
            WHERE id_prod = '".$this -> id."'
            ");
           }elseif($this -> categoria){
            $resul = $this -> Query("SELECT 
            id_prod, 
            nombre_prod, 
            descripcion_prod, 
            precio_prod, 
            cantidad_prod 
            FROM productos 
            INNER JOIN categoria_productos 
            ON productos.id_cat_prod = categoria_productos.id_cat 
            WHERE categoria_productos.nombre_cat = '".$this -> categoria."'
            ");
           }else{
            $resul = $this -> Query("SELECT 
            id_prod, 
            nombre_prod, 
            descripcion_prod, 
            precio_prod, 
            cantidad_prod 
            FROM productos
            "); 
           }
           $data = [];
           while($row = mysqli_fetch_array($resul)){
               $producto['id_prod'] = $row['id_prod'];
               $producto['nombre_prod'] = $row['nombre_prod'];
               $producto['descripcion_prod'] = $row['descripcion_prod'];
               $producto['precio_prod'] = $row['precio_prod'];
               $producto['cantidad_prod'] = $row['cantidad_prod'];
               $resul_img_prod = $this -> Query("SELECT * FROM imagen_producto WHERE id_prod_img = '".$producto['id_prod']."'");
               $img_prod = [];
                while($row = mysqli_fetch_array($resul_img_prod)){
                    $img['url_img'] = $row['url_img'];
                    array_push($img_prod, $img);
                }
                $producto['imgs'] = $img_prod;
                array_push($data, $producto);
           }
           echo json_encode($data);
        }
        private function get_galeria(){
            $resul = $this -> QUERY("SELECT * FROM galeria");
            $data = [];
            while($row = mysqli_fetch_array($resul)){
                $img['id_img_gal'] = $row['id_img_gal'];
                $img['url_img_gal'] = $row['url_img_gal'];
                array_push($data, $img);
            }
            echo json_encode($data);
        }
        private function get_carrito(){
            //get PRODUCTS TO CART
            $resul[] = 'get PRODUCTS TO CART';
            echo json_encode($resul);
        }
        private function get_categoria(){
            $resul = $this -> Query('SELECT * FROM categoria_productos');
            $data = [];
            while($row = mysqli_fetch_array($resul)){
                $categoria['id_cat'] = $row['id_cat'];
                $categoria['nombre_cat'] = $row['nombre_cat'];
                array_push($data, $categoria);
            }
            echo json_encode($data);
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