<?php
    namespace Controllers;
    use Repositories\RCRepository;
    use Repositories\RutaRepository;
    use Lib\Pages;
    use Models\rcomentario;

    class RComentarioController{
        private Pages $pages;
        private RCRepository $repositorio;
        private RutaRepository $rutarepositorio;

        function __construct(){
            $this -> pages = new Pages();
            $this -> repositorio = new RCRepository;
            $this -> rutarepositorio = new RutaRepository;
        }

        //GUARDA UN COMENTARIO EN LA BASE DE DATOS
        public function save(){
            
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $datos_ruta = $this -> rutarepositorio -> datos_ruta($_GET['id']);
                $_SESSION['comentario_error'] = "";
                $_SESSION['cnombre_error'] = "";
                $_SESSION['fecha_error'] = "";
                $_SESSION['datos_ruta'] = $datos_ruta;
                $_SESSION['id_ruta'] = $_GET['id'];
                $comentarios_a_mostrar = $this -> repositorio -> getComentarios($_SESSION['id_ruta']);
                $this -> pages -> render("CRuta/comentar", ['comentario' => $datos_ruta, 'comentarios' => $comentarios_a_mostrar]);
            }
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $datos = $_POST['data'];
                $comentarios_a_mostrar = $this -> repositorio -> getComentarios($_SESSION['id_ruta']);
                if($this -> validar_comentario($datos)){
                    $this -> repositorio -> save($_POST['data']);
                    $this -> pages -> render("CRuta/comentar", ['comentario' => $_SESSION['datos_ruta'], 'comentarios' => $comentarios_a_mostrar]);
                } else{
                    $this -> pages -> render("CRuta/comentar", ['comentario' => $_SESSION['datos_ruta'], 'comentarios' => $comentarios_a_mostrar]);
                }
            } else{
                $this -> pages -> render("CRuta/comentar");
            }
        }


        //VALIDA UN COMENTARIO
        public function validar_comentario(array $datos): bool{
            if($datos['nombre'] === ""){
                $_SESSION['cnombre_error'] = 'Debe introducir su nombre';
                return false;
            }
            else{
                $_SESSION['cnombre_error'] = '';
            }
            
            if($datos['comentario'] === ''){
                $_SESSION['comentario_error'] = 'Tiene que introducir un comentario';
                return false;
            }else{
                $_SESSION['comentario_error'] = '';
            }
            
            return true;
            
        }
            


        //BORRA UN COMENTARIO
        public function borrar(){
            $this -> repositorio -> borrar($_GET['id']);
        }
        
        
    }
    
?>