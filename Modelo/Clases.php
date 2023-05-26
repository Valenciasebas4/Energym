<?php
require_once '../Modelo/db.php';

class Usuario {
    private $id;
    private $UsuarioID;
    private $DiaSemana;
    private $ClasePersonalizada;
    private $FechaClase;
    private $db;


    public function __construct($db, $id) {
        $this->db = $db;
        $this->id = $id;
    }

    // Método getter para la propiedad 'id'
    public function getId() {
        return $this->id;
    }

    // Método setter para la propiedad 'id'
    public function setId($id) {
        $this->id = $id;
    }

    // Método getter para la propiedad 'UsuarioID'
    public function getUsuarioID() {
        return $this->UsuarioID;
    }

    // Método setter para la propiedad 'UsuarioID'
    public function setUsuarioID($UsuarioID) {
        $this->UsuarioID = $UsuarioID;
    }

    // Método getter para la propiedad 'DiaSemana'
    public function getDiaSemana() {
        return $this->DiaSemana;
    }

    // Método setter para la propiedad 'DiaSemana'
    public function setDiaSemana($DiaSemana) {
        $this->DiaSemana = $DiaSemana;
    }

    // Método getter para la propiedad 'ClasePersonalizada'
    public function getClasePersonalizada() {
        return $this->ClasePersonalizada;
    }

    // Método setter para la propiedad 'ClasePersonalizada'
    public function setClasePersonalizada($ClasePersonalizada) {
        $this->ClasePersonalizada = $ClasePersonalizada;
    }

    public function getFechaClase() {
        return $this->FechaClase;
    }

    public function setFechaClase($FechaClase) {
        $this->FechaClase = $FechaClase;
    }
    public function getDb() {
      return $this->db;
    }
  
    public function setDb($db) {
      $this->db = $db;
    }
}

function guardarClases($UsuarioID, $FechaClase,$DiaSemana, $ClasePersonalizada, $db) {
    try {
      $stmt = $db->prepare("INSERT INTO entrenamientos (UsuarioID, FechaClase,DiaSemana, ClasePersonalizada) VALUES (:UsuarioID, :FechaClase, :DiaSemana, :ClasePersonalizada)");
      $stmt->bindParam(':UsuarioID', $UsuarioID);
      $stmt->bindParam(':DiaSemana', $DiaSemana);
      $stmt->bindParam(':ClasePersonalizada', $ClasePersonalizada);
      $stmt->bindParam(':FechaClase', $FechaClase);
      $stmt->execute();
      return true;
    } catch(PDOException $e) {
      echo "Error al guardar entrenamiento: " . $e->getMessage();
      return false;
    }
  }


?>