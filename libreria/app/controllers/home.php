<?php

    class home extends Controller{

        public function __construct()
        {
            $this->libros = $this->model('libros');
        }
        public function index(){

            $getLibros = $this->libros->mostrarTodos();

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                


            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                foreach ($_POST as $name => $val)
                {
                    if($name == 'buscarA'){
                        $getLibros = $this->libros->buscarAutor($_POST['buscarA']);
                        $datos = [
        
                            'libros' => $getLibros,
                            'options' => $opcionesLibros
        
                        ];
                    }
                    else if($name == 'buscarT'){

                        $getLibros = $this->libros->buscarTitulo($_POST['buscarT']);
                        $datos = [
        
                            'libros' => $getLibros,
                            'options' => $opcionesLibros
        
                        ];

                    }
                    else if($name == 'buscarG'){
                        $getLibros = $this->libros->buscarGenero($_POST['buscarG']);
                        $datos = [
        
                            'libros' => $getLibros,
                            'options' => $opcionesLibros
        
                        ];
                    }
                }
            }
            else{
                $getLibros = $this->libros->mostrarTodos();
                $datos = [

                    'libros' => $getLibros,
                    'options' => $opcionesLibros
                ];
            }

            $this->view('/pantallas/inicio', $datos);
        }

        public function nuevo(){
            $getLibros = $this->libros->mostrarTodos();

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros
            ];

            $this->view('/pantallas/nuevo', $datos);
        }

        public function borrar(){
            $getLibros = $this->libros->mostrarTodos();

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros
            ];

            $this->view('/pantallas/borrar', $datos);
        }

        public function ampliar($id){
            $getLibros = $this->libros->mostrarResumen($id);
            $getComen = $this->libros->buscarCom($id);

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros,
                'comen' => $getComen,

            ];

            $this->view('/pantallas/masinfo', $datos);
        }

        public function comentarios(){
            $getLibros = $this->libros->mostrarTodos();
           

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros,

            ];

            $this->view('/pantallas/comentario', $datos);
        }


        
        public function modifP(){
            $getLibros = $this->libros->mostrarTodos();

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros
            ];

            $this->view('/pantallas/modifP', $datos);
        }

        public function modifV(){
            $getLibros = $this->libros->mostrarTodos();

            $opcionesLibros = [
                'autor' =>$this->libros->getOptionLibros('autor'),
                'genero'=>$this->libros->getOptionLibros('genero'),
                'editorial'=>$this->libros->getOptionLibros('editorial'),
                'valoracion'=>$this->libros->getOptionLibros('valoracion')
                

            ];

            $datos = [

                'libros' => $getLibros,
                'options' => $opcionesLibros
            ];

            $this->view('/pantallas/modifV', $datos);
        }


        public function incluir(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datosLibro = [
                    'titulo' => trim($_POST['titulo']),
                    'autor' => trim($_POST['autor']),
                    'genero' => trim($_POST['genero']),
                    'editorial' => trim($_POST['editorial']),
                    'precio' => trim($_POST['precio']),
                    'num_pag' => trim($_POST['num_pag']),
                    'valoracion' => trim($_POST['valoracion']),
                    'resumen' => trim($_POST['resumen'])
                ];

                if($this->libros->incluir($datosLibro)){
                    redirigir('/home');
                }
                else{
                    redirigir('/home');
                }
            }
            else{
                redirigir('/home');
            }
        }

        public function eliminar(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datosLibro = [
                    'id' => trim($_POST['id']),
                ];

                if($this->libros->eliminar($datosLibro)){
                    redirigir('/home');
                }
                else{
                    redirigir('/home');
                }
            }
            else{
                redirigir('/home');
            }
        }

        public function modificarP(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datosLibro = [
                    'id' => trim($_POST['id']),
                    'precio' => trim($_POST['precio']),
                ];

                if($this->libros->modificarP($datosLibro)){
                    redirigir('/home');
                }
                else{
                    redirigir('/home');
                }
            }
            else{
                redirigir('/home');
            }
        }

        public function modificarV(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datosLibro = [
                    'id' => trim($_POST['id']),
                    'valoracion' =>trim($_POST['valoracion']),
                ];

                if($this->libros->modificarV($datosLibro)){
                    redirigir('/home');
                }
                else{
                    redirigir('/home');
                }
            }
            else{
                redirigir('/home');
            }
        }

        public function comentar(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datosCom = [
                    'id' => trim($_POST['titulo']),
                    'comentario' =>trim($_POST['comentario']),
                ];

                if($this->libros->incluirC($datosCom)){
                    redirigir('/home');
                }
                else{
                    redirigir('/home');
                }
            }
            else{
                redirigir('/home');
            }
        }

    }
    

    
