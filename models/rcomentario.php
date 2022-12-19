<?php
    namespace Models;
    use PDO;
    use PDOException;
    use Lib\BaseDatos;

    // CREAR LA CLASE USUARIOS

    class RComentario{
            private string $id;
            private string $id_ruta;
            private string $nombre;
            private string $texto;
            private string $fecha;

            
            private BaseDatos $db;
            
            public function __construct(string $id,string $id_ruta, string $nombre,string $texto, string $fecha)
            {
                $this -> db = new BaseDatos();
                $this -> id = $id;
                $this -> id_ruta = $id_ruta;
                $this -> nombre = $nombre;
                $this -> texto = $texto;
                $this -> fecha = $fecha;
            }
            
            public static function fromArray(array $data): RComentario{
                return new RComentario(
                    $data['id'],
                    $data['id_ruta'],
                    $data['nombre'],
                    $data['texto'],
                    $data['fecha'],
                );
            }
                /**
                 * Get the value of id
                 */ 
                public function getId()
                {
                                return $this->id;
                }

                public function setId($id)
                {
                                $this->id = $id;

                                return $this;
                }

                /**
                 * Get the value of id_ruta
                 */ 
                public function getId_ruta()
                {
                                return $this->id_ruta;
                }

                public function setId_ruta($id_ruta)
                {
                                $this->id_ruta = $id_ruta;

                                return $this;
                }

                /**
                 * Get the value of nombre
                 */ 
                public function getNombre()
                {
                                return $this->nombre;
                }

                public function setNombre($nombre)
                {
                                $this->nombre = $nombre;

                                return $this;
                }

                /**
                 * Get the value of texto
                 */ 
                public function getTexto()
                {
                                return $this->texto;
                }

                public function setTexto($texto)
                {
                                $this->texto = $texto;

                                return $this;
                }

                /**
                 * Get the value of fecha
                 */ 
                public function getFecha()
                {
                                return $this->fecha;
                }

                public function setFecha($fecha)
                {
                                $this->fecha = $fecha;

                                return $this;
                }

        }
?>