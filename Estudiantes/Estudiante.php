<?php

    require_once("../Config/db.php");
    require_once("../Config/conectar.php");

    class Estudiante extends Conectar{
        private $id;
        private $imagen;
        private $nombres;
        private $direccion;
        private $logros;
        private $ser;
        private $ingles;
        private $review;
        private $skllis;
        private $especialidad;

        public function __construct($id = 0,$imagen="", $nombres = "", $direccion = "", $logros = "", $ser = "", $ingles = "", $review = "", $skllis="", $especialidad="", $dbCnx = ''){
            $this -> id = $id;
            $this -> imagen = $imagen;
            $this -> nombres = $nombres;
            $this -> direccion = $direccion;
            $this -> logros = $logros;
            $this -> ser = $ser;
            $this -> ingles = $ingles;
            $this -> review = $review;
            $this -> skllis = $skllis;
            $this -> especialidad = $especialidad;
            parent::__construct($dbCnx);
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setNombres($nombres){
            $this->nombres = $nombres;
        }

        public function getNombres(){
            return $this->nombres;
        }

        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setLogros($logros){
            $this->logros = $logros;
        }

        public function getLogros(){
            return $this->logros;
        }

        public function setSer($ser){
            $this->ser = $ser;
        }

        public function getSer(){
            return $this->ser;
        }
        public function setIngles($ingles){
            $this->ingles = $ingles;
        }

        public function getIngles(){
            return $this->ingles;
        }
        public function setReview($review){
            $this->review = $review;
        }

        public function getReview(){
            return $this->review;
        }
        public function setSkllis($skllis){
            $this->skllis = $skllis;
        }

        public function getSkllis(){
            return $this->skllis;
        }
        public function setEspecialidad($especialidad){
            $this->especialidad = $especialidad;
        }

        public function getEspecialidad(){
            return $this-$especialidad;
        }

        public function insertData(){
            try {
                $stm = $this->dbCnx -> prepare("INSERT INTO campers (imagen, nombre, direccion, logros, ser, ingles, review, skllis,especialidad) values(?,?,?,?,?,?,?,?,?)");
                $stm -> execute([$this->imagen, $this->nombres,$this->direccion,$this->logros,$this->ser,$this->ingles,$this->review,$this->skllis,$this->especialidad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            
        }

        public function obtainAll(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM campers");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function delete(){
            try {
                $stm = $this->dbCnx -> prepare("DELETE FROM campers WHERE id = ?");
                $stm -> execute([$this->id]);
                return $stm -> fetchAll();
                echo "<script>alert('Registro eliminado');document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm = $this->dbCnx -> prepare("SELECT * FROM campers WHERE id =?");
                $stm -> execute([$this->id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function update(){
            try {
                $stm = $this->dbCnx ->prepare("UPDATE campers SET nombre = ?, direccion = ?,logros  = ? WHERE id =?");
                $stm -> execute([$this->nombres,$this->direccion,$this->logros,$this->id]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

?>