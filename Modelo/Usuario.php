<?php
require_once '../Modelo/db.php';

class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $fnacimiento;
    private $email;
    private $telefono;
    private $fregistro;
    private $rol;
    private $contrasena;
    private $db;
  

    public function __construct($db, $id) {
      $this->db = $db;
      $this->id = $id;
  }



    public function getId() {
      return $this->id;
    }
  
    public function setId($id) {
      $this->id = $id;
    }

    public function getNombre() {
      return $this->nombre;
    }
  
    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }
  
    public function getApellido() {
      return $this->apellido;
    }
  
    public function setApellido($apellido) {
      $this->apellido = $apellido;
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail($email) {
      $this->email = $email;
    }
  
    public function getFnacimiento() {
      return $this->fnacimiento;
    }
  
    public function setFnacimiento($fnacimiento) {
      $this->fnacimiento = $fnacimiento;
    }
  
    public function getTelefono() {
      return $this->telefono;
    }
  
    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }

    public function getFregistro() {
      return $this->fregistro;
    }
  
    public function setFregistro($fregistro) {
      $this->fregistro = $fregistro;
    }

    public function getRol() {
      return $this->rol;
    }
  
    public function setRol($rol) {
      $this->rol = $rol;
    }

    
  public function getContrasena() {
    return $this->contrasena;
  }

  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }
  
    public function getDb() {
      return $this->db;
    }
  
    public function setDb($db) {
      $this->db = $db;
    }
}
 // Guarda la informacion en la base de datos
    function guardarUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol,$contrasena, $db) {
        try {
          $stmt = $db->prepare("INSERT INTO usuarios (id, nombre, apellido, fnacimiento, email, telefono,fregistro,rol, contrasena) VALUES (:id, :nombre, :apellido, :fnacimiento, :email, :telefono, :fregistro, :rol, :contrasena)");
          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':nombre', $nombre);
          $stmt->bindParam(':apellido', $apellido);
          $stmt->bindParam(':fnacimiento', $fnacimiento);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':telefono', $telefono);
          $stmt->bindParam(':fregistro', $fregistro);
          $stmt->bindParam(':rol', $rol);
          $stmt->bindParam(':contrasena', $contrasena);
          $stmt->execute();
          return true;
        } catch(PDOException $e) {
          echo "Error al guardar usuario: " . $e->getMessage();
          return false;
        }
      }
    
      function validarUsuario($id, $email, $db) {
        try {
            $stmt = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE id = :id AND email = :email");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            $count = $stmt->fetchColumn();
    
            if ($count == 1) {
                // Los datos coinciden, retornar true
                return true;
            } else {
                // Los datos no coinciden, retornar false
                return false;
            }
        } catch(PDOException $e) {
            echo "Error al validar usuario: " . $e->getMessage();
            return false;
        }
    }

    function validarCrearUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol,$contrasena, $db) {
      try {
          // Verificar si el usuario ya existe
          $stmt = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE id = :id AND email = :email");
          $stmt->bindParam(':id', $id);
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          $count = $stmt->fetchColumn();
  
          if ($count == 1) {
              // El usuario ya existe, retornar false
              return false;
          } else {
              // El usuario no existe, crearlo
              return guardarUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol,$contrasena, $db);
          }
      } catch(PDOException $e) {
          echo "Error al validar o crear usuario: ";
          return false;
      }
  }

  function editarUsuario($id, $nombre, $apellido, $fnacimiento, $email, $telefono,$fregistro,$rol,$contrasena, $db) {
    try {
        $stmt = $db->prepare("UPDATE usuarios SET nombre=:nombre, apellido=:apellido, fnacimiento=:fnacimiento, email=:email, telefono=:telefono, fregistro=:fregistro, rol=:rol, contrasena=:contrasena WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fnacimiento', $fnacimiento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fregistro', $fregistro);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->execute();
        return true;
    } catch(PDOException $e) {
        echo "Error al editar usuario: " . $e->getMessage();
        return false;
    }
}

// Consultamos el nombre del usuario en la base de datos
function obtenerNombreUsuario($id, $db) {
  try{
  $sql = "SELECT nombre FROM usuarios WHERE id = :id";

  $stmt = $db->prepare($sql);

  // Asignamos los valores a los parámetros de la consulta
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);


  $stmt->execute();

  // Obtenemos el resultado de la consulta
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Si se encontró el nombre del usuario, lo retornamos; de lo contrario, retornamos false
  return ($result) ? $result['nombre'] : false;
  }catch(PDOException $e) {
    echo "Error al editar usuario: " . $e->getMessage();
    return false;
}
}

// Consultamos el rol del usuario
function obtenerRol($id, $db) {
  try{
  $sql = "SELECT rol FROM usuarios WHERE id = :id";

  $stmt = $db->prepare($sql);

  // Asignamos los valores a los parámetros de la consulta
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);


  $stmt->execute();

  // Obtenemos el resultado de la consulta
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Si se encontró el rol del usuario, lo retornamos; de lo contrario, retornamos false
  return ($result) ? $result['rol'] : false;
  }catch(PDOException $e) {
    echo "Error al editar usuario: " . $e->getMessage();
    return false;
}
}

// Consultamos el rol del usuario
function obtenerFnacimiento($id, $db) {
  try{
  $sql = "SELECT fnacimiento FROM usuarios WHERE id = :id";

  $stmt = $db->prepare($sql);

  // Asignamos los valores a los parámetros de la consulta
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);


  $stmt->execute();

  // Obtenemos el resultado de la consulta
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Si se encontró el rol del usuario, lo retornamos; de lo contrario, retornamos false
  return ($result) ? $result['fnacimiento'] : false;
  }catch(PDOException $e) {
    echo "Error al editar usuario: " . $e->getMessage();
    return false;
}
}


      

// Función para verificar si un ID ya existe en la base de datos
function existeID($id, $db) {
  $stmt = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE id = ?");
  $stmt->execute(array($id));
  $count = $stmt->fetchColumn();
  return ($count > 0);
}

// Función para verificar si un correo electrónico ya existe en la base de datos
function existeEmail($email, $db) {
  $stmt = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
  $stmt->execute(array($email));
  $count = $stmt->fetchColumn();
  return ($count > 0);
}


function validarContrasena($contrasena) {
  // Verificar si la contraseña tiene al menos 8 caracteres
  if (strlen($contrasena) < 8) {
      return false;
  }
  
  // Verificar si la contraseña tiene al menos un carácter especial
  if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $contrasena)) {
      return false;
  }
  
  // Verificar si la contraseña tiene al menos una mayúscula
  if (!preg_match('/[A-Z]/', $contrasena)) {
      return false;
  }
  
  // Verificar si la contraseña contiene números
  if (!preg_match('/[0-9]/', $contrasena)) {
      return false;
  }
  
  // Verificar si la contraseña tiene al menos una minúscula
  if (!preg_match('/[a-z]/', $contrasena)) {
      return false;
  }
  
  // La contraseña cumple con todos los requisitos
  return true;
}

?>