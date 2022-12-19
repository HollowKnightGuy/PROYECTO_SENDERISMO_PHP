<?php
    namespace Controllers;
    use Repositories\RutaRepository;
    use Repositories\RCRepository;
    use Lib\Pages;
    use Models\Ruta;


    class RutaController{
        private Pages $pages;
        private RutaRepository $repositorio;
        private RCRepository $rcrepositorio;

        function __construct(){
            $this -> pages = new Pages();
            $this -> repositorio = new RutaRepository;
            $this -> rcrepositorio = new RCRepository;
        }

        function resetear_errores(){
            $_SESSION['tituloerror'] = "";
            $_SESSION['camposerror'] = "";
            $_SESSION['descripcionerror'] = "";
            $_SESSION['desnivelerror'] = "";
            $_SESSION['distanciaerror'] = "";
        }

        //INSERTA RUTAS EN LA BASE DE DATOS
        public function save(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $datos = $_POST['data'];
                if($this -> comprobar_nueva_ruta($datos)){
                    $this -> repositorio -> save($_POST['data']);
                    $this -> resetear_errores();
                }else{
                    $this -> pages -> render("Ruta/nuevaruta");
                }
            }
            else{
                $this -> resetear_errores();
                $this -> pages -> render("Ruta/nuevaruta");
            }
        }
        

        //MODIFICA LOS DATOS DE UNA RUTA
        public function modificar(){
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $_SESSION['id_ruta'] = $_GET['id'];
                $datos_ruta = $this -> repositorio -> datos_ruta($_SESSION['id_ruta']);
                $_SESSION['datos_ruta'] =  $datos_ruta;
                $this -> pages -> render("Ruta/modificar", ['ruta' => $datos_ruta]);
            }
            else if($_SERVER['REQUEST_METHOD'] === 'POST'){
                if($this -> comprobar_nueva_ruta($_POST['data'])){
                    $this -> repositorio -> modificar($_POST['data']);
                    $this -> pages -> render("Ruta/modificar", ['ruta' => $_POST['data']]);
                    $this -> resetear_errores();
                }
            }else{
                $this -> pages -> render("Ruta/modificar", ['ruta' => $_SESSION['datos_ruta']]);
            }
        }


        //COMPRUEBA QUE AL MODIFICAR O AL CREAR UNA NUEVA RUTA ESTE BIEN ESPECIFICADA
        public function comprobar_nueva_ruta(array $datos):bool{
            $rutas_repetidas = $this -> repositorio -> datos_ruta_por_nombre($datos['titulo']);
            if($datos['titulo'] === "" || $rutas_repetidas){
                $_SESSION['tituloerror'] = "ERROR: Titulo incorrecto o usado";
                return false;
            } else{
                $_SESSION['tituloerror'] = "" ;
            }

            if($datos['descripcion'] === "" || $datos['desnivel'] === ""){
                $_SESSION['camposerror'] = "ERROR: No se puede realizar la operacion: el campo 'Descripcion/Desnivel' es obligatorio";
                return false;
            } else{
                $_SESSION['camposerror'] = "" ;
            }
            if (strlen($datos['descripcion']) > 55){
                $_SESSION['descripcionerror'] = "ERROR: La descripcion es demasiado larga";
                return false;
            }else{
                $_SESSION['descripcionerror'] = "" ;
            } 
            if ($datos['desnivel'] > 999999){
                $_SESSION['desnivelerror'] = "ERROR: El desnivel es demasiado grande. Maximo 999999";
                          
                return false;
            }else{
                $_SESSION['desnivelerror'] = "" ;
            } 

            if($datos['distancia'] === ""){
                $_SESSION['distanciaerror'] = "ERROR: El campo Distancia es obligatorio";
                return false;
            }else{
                $_SESSION['distanciaerror'] = "";
            }
            $datos['distancia'] = floatval($datos['distancia']);
            return true;
        }

        //MANDA A LA VISTA LISTAR Y MUESTRA TODAS LAS RUTAS
        public function listar():void{
            $ruta = $this-> repositorio -> getAll();
            $numero_rutas = $this -> numero_rutas();
            $kilometros = $this -> kilometros();
            $this->pages->render('Ruta/listar', ['rutas' => $ruta, 'numero_rutas' => $numero_rutas, 'kilometros' => $kilometros]);
        }


        //BUSCA UNA RUTA
        public function buscar():void{
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $campo = $_POST['data']['campo'];
                $texto = $_POST['data']['texto_buscar'];
                $rutas = $this -> repositorio -> getRutas($campo, $texto);
                $numero_rutas = $this -> numero_rutas();
                $kilometros = $this -> kilometros();
                $this->pages->render('Ruta/listar', ['rutas' => $rutas, 'numero_rutas' => $numero_rutas, 'kilometros' => $kilometros]);
            }
        }

        //BORRRA LAS RUTAS
        public function borrar():void{
            $this -> rcrepositorio -> borrar ($_GET['id']);
            $this -> repositorio -> borrar($_GET['id']);
            $this -> listar();
        }

        //DEVUELVE EL NUMERO DE RUTAS EXISTENTES
        public function numero_rutas(){
            return $this -> repositorio -> numero_rutas();
        }


        //DEVUELVE EL NUMERO DE KILOMETROS TOTALES
        public function kilometros(){
            return $this -> repositorio -> kilometros();
        }

    }
?>