<?php

require_once("repositorio.php");
require_once("repoContactsSQL.php");

class RepositorioSQL extends Repositorio {

  protected $conexion;

  /**
   * [__construct Establece la conexion con la base]
   */
  public function __construct() {

    try {
      $this->conexion = new PDO( $_ENV['DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'] );
    } catch (Exception $e) {
      echo 'No se pudo conectar a la base de datos. Error: '. $e .' intente mas tarde...';
    }

    $this->repoContacts = new RepoContactsSQL($this->conexion);

  }
}

?>
