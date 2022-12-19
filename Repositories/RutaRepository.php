<?php
    namespace Repositories;
    use Lib\BaseDatos;
    use Models\Ruta;
    use PDO;
    use PDOException;

    class RutaRepository{
        private BaseDatos $conexion;
        private RutaRepository $repository;

        function __construct(){
            $this-> conexion = new BaseDatos();
        }


        //SACA TODAS LAS RUTAS DE LA BASE DE DATOS
        public function getAll(): ?array{
            $this -> conexion -> consulta('SELECT * FROM rutas');
            return $this -> extraer_todos();
        }

        //INSERTA RUTAS EN LA BASE DE DATOS
        public function save($ruta):void{

            $sql = ("INSERT INTO rutas(titulo,descripcion,desnivel,distancia,notas,dificultad) values(?,?,?,?,?,?)");
            $consult = $this -> conexion -> prepara($sql);
            $consult -> bindParam(1,$ruta['titulo']);
            $consult -> bindParam(2,$ruta['descripcion']);
            $consult -> bindParam(3,$ruta['desnivel']);
            $consult -> bindParam(4,$ruta['distancia']);
            $consult -> bindParam(5,$ruta['notas']);
            $consult -> bindParam(6,$ruta['dificultad']);
            try{
                $consult -> execute();
                header("Location: ../index.php");
            }catch(PDOException $err){
                // echo "No se ha podido introducir la ruta. Intentelo de nuevo";
                echo $err;
            }
        }

        //BORRRA LAS RUTAS
        public function borrar($id):void{
            
            $sql = ("DELETE FROM rutas WHERE id = :id");
            $consulta_borrado = $this -> conexion -> prepara($sql);
            $consulta_borrado -> bindParam(':id',$id);
            try{
                $consulta_borrado -> execute();
            }catch(PDOException $err){
                echo "error";
            }
        }

        //TRANSFORMA UNA CONSULTA EN UN ARRAY DE OBJETOS RUTA
        public function extraer_todos(): ?array{
            $ruta = [];
            $rutasData = $this -> conexion -> extraer_todos();

            foreach($rutasData as $rutaData){
                $ruta[] = Ruta::fromArray($rutaData);
            }
            return $ruta;
        }


        //DEVUELVE LOS DATOS DE UNA RUTA
        public function datos_ruta($id): array{
            $datos = $this -> conexion -> consulta("SELECT * FROM rutas WHERE id ='{$id}'");
            $registro = $this -> conexion -> extraer_registro();
            return $registro;
        }

        //DEVUELVE LOS DATOS DE UNA RUTA BUSCANDOLA POR EL NOMBRE
        public function datos_ruta_por_nombre($titulo): bool{
            $datos = $this -> conexion -> consulta("SELECT * FROM rutas WHERE titulo = '{$titulo}'");
            $registro = $this -> conexion -> extraer_todos();
            if(count($registro) === 0){
                return False;
            } else{
                return True;
            }
        }


        //NO FUNCIONA CON EL BINDPARAM
        //BUSCA LAS RUTAS Y LAS DEVUELVE
        public function getRutas($campo, $texto): ?array{
            $texto = strtolower($texto);
            $consult = $this -> conexion -> prepara("SELECT * FROM rutas WHERE LOWER($campo) LIKE '%$texto%' OR LOWER($campo) LIKE '%$texto' OR LOWER($campo) LIKE '$texto%'");
            // $consult -> bindParam(':campo', $campo);
            // $consult -> bindParam(':texto', $texto);
            try{
                $consult -> execute();
                $datos = $consult -> fetchAll();
                $rutas = [];
                foreach($datos as $rutaData){
                    $rutas[] = Ruta::fromArray($rutaData);
                }
                return $rutas;
            }catch(PDOException $err){
                // echo "No se ha podido introducir la ruta. Intentelo de nuevo";
                echo $err;
            }

            return $this -> extraer_todos();
        }


        //MODIFICA LAS RUTAS
        public function modificar($ruta){
                $sql = "UPDATE rutas SET titulo = ?, descripcion = ?, desnivel = ?, distancia = ?, notas = ?, dificultad = ? WHERE id = ?";
                $consult = $this -> conexion -> prepara($sql);
                $consult -> bindParam(1,$ruta['titulo']);
                $consult -> bindParam(2,$ruta['descripcion']);
                $consult -> bindParam(3,$ruta['desnivel']);
                $consult -> bindParam(4,$ruta['distancia']);
                $consult -> bindParam(5,$ruta['notas']);
                $consult -> bindParam(6,$ruta['dificultad']);
                $consult -> bindParam(7,$_SESSION['id_ruta']);
                try{
                    $consult -> execute();
                }catch(PDOException $err){
                    // echo "No se ha podido introducir la ruta. Intentelo de nuevo";
                    echo $err;
                }
                
            }


        //DEVUELVE EL NUMERO DE RUTAS
        public function numero_rutas(){
            $sql = $this -> conexion -> consulta('SELECT count(id) FROM rutas');
            return $this -> conexion -> extraer_registro();
        }

        //DEVUELVE EL NUMERO DE KILOMETROS
        public function kilometros(){
            $sql = $this -> conexion -> consulta('SELECT SUM(distancia) FROM rutas');
            return $this -> conexion -> extraer_registro();
        }
    }




    

?>