<?php
    namespace Repositories;
    use Lib\BaseDatos;
    use Models\RComentario;
    use PDO;
    use PDOException;

    class RCRepository{
        private BaseDatos $conexion;
        private RCRepository $repository;

        function __construct(){
            $this-> conexion = new BaseDatos();
        }
        


        //DEVUELVE TODOS LOS COMENTARIOS DE UNA RUTA
        public function getComentarios($id): ?array{
            $this -> conexion -> consulta('SELECT * FROM rutas_comentarios WHERE id_ruta = '.$id);
            return $this -> extraer_todos();
        }


        //GUARDA UN COMENTARIO
        public function save($comentario):void{
            $date = date('d/m/y');
            $sql = ("INSERT INTO rutas_comentarios(id_ruta,nombre, texto, fecha) values(?,?,?,?)");
            $consult = $this -> conexion -> prepara($sql);
            $consult -> bindParam(1,$comentario['id_ruta']);
            $consult -> bindParam(2,$comentario['nombre']);
            $consult -> bindParam(3,$comentario['comentario']);
            $consult -> bindParam(4, $date);
            
            try{
                $consult -> execute();
            }catch(PDOException $err){
                echo "NO SE HA PODIDO INTRODUCIR EL COMENTARIO";
            }
        }


        //DEVUELVE TODOS LOS COMENTARIOS PEDIDOS EN UN ARRAY DE OBJETOS COMENTARIO
        public function extraer_todos(): ?array{
            $comentarios = [];
            $comentariosData = $this -> conexion -> extraer_todos();

            foreach($comentariosData as $comentarioData){
                $comentarios[] = RComentario::fromArray($comentarioData);
            }
            return $comentarios;
        }

        //BORRA TODOS LOS COMENTARIOS DE UNA RUTA
        public function borrar($id_ruta):void{
            
            $sql = ("DELETE FROM rutas_comentarios WHERE id_ruta = :id");
            $consulta_borrado = $this -> conexion -> prepara($sql);
            $consulta_borrado -> bindParam(':id',$id_ruta);
            try{
                $consulta_borrado -> execute();
            }catch(PDOException $err){
                echo "error";
            }
        }


    }

?>