<?php
    namespace Models;
    use PDO;
    use PDOException;
    use Lib\BaseDatos;

    // CREAR LA CLASE USUARIOS

    class Ruta{
            private string $id;
            private string $titulo;
            private string $distancia;
            private string $notas;
            private string $dificultad;
            private string $desnivel;
            private string $descripcion;

            private BaseDatos $db;

            public function __construct(string $id, string $titulo, string $descripcion, string $desnivel, string $distancia, string $notas, string $dificultad)
            {
                $this -> db = new BaseDatos();
                $this -> id = $id;
                $this -> titulo = $titulo;
                $this -> descripcion = $descripcion;
                $this -> desnivel = $desnivel;
                $this -> distancia = $distancia;
                $this -> notas = $notas;
                $this -> dificultad = $dificultad;
            }

            
            public static function fromArray(array $data): Ruta{
                return new Ruta(
                    $data['id'],
                    $data['titulo'],
                    $data['descripcion'],
                    $data['desnivel'],
                    $data['distancia'],
                    $data['notas'],
                    $data['dificultad'],
                );
            }

            /**
             * Get the value of desnivel
             */ 
            public function getDesnivel()
            {
                        return $this->desnivel;
            }

            /**
             * Set the value of desnivel
             *
             * @return  self
             */ 
            public function setDesnivel($desnivel)
            {
                        $this->desnivel = $desnivel;

                        return $this;
            }

            /**
             * Get the value of dificultad
             */ 
            public function getDificultad()
            {
                        return $this->dificultad;
            }

            /**
             * Set the value of dificultad
             *
             * @return  self
             */ 
            public function setDificultad($dificultad)
            {
                        $this->dificultad = $dificultad;

                        return $this;
            }

            /**
             * Get the value of notas
             */ 
            public function getNotas()
            {
                        return $this->notas;
            }

            /**
             * Set the value of notas
             *
             * @return  self
             */ 
            public function setNotas($notas)
            {
                        $this->notas = $notas;

                        return $this;
            }

            /**
             * Get the value of distancia
             */ 
            public function getDistancia()
            {
                        return $this->distancia;
            }

            /**
             * Set the value of distancia
             *
             * @return  self
             */ 
            public function setDistancia($distancia)
            {
                        $this->distancia = $distancia;

                        return $this;
            }

            /**
             * Get the value of titulo
             */ 
            public function getTitulo()
            {
                        return $this->titulo;
            }

            /**
             * Set the value of titulo
             *
             * @return  self
             */ 
            public function setTitulo($titulo)
            {
                        $this->titulo = $titulo;

                        return $this;
            }

            /**
             * Get the value of id
             */ 
            public function getId()
            {
                        return $this->id;
            }

            /**
             * Set the value of id
             *
             * @return  self
             */ 
            public function setId($id)
            {
                        $this->id = $id;

                        return $this;
            }

            /**
             * Get the value of descripcion
             */ 
            public function getDescripcion()
            {
                        return $this->descripcion;
            }

            /**
             * Set the value of descripcion
             *
             * @return  self
             */ 
            public function setDescripcion($descripcion)
            {
                        $this->descripcion = $descripcion;

                        return $this;
            }
        }
?>