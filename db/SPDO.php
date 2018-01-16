<?php
 
require_once "/../config/config.php";

class SPDO
{
  /**
   * Instance de la classe PDO
   *
   * @var PDO
   * @access private
   */ 
  public $PDOInstance = null;
 
   /**
   * Instance de la classe SPDO
   *
   * @var SPDO
   * @access private
   * @static
   */ 
  private static $instance = null;
 
  /**
   * Constante: nom d'utilisateur de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_USER = SQL_USER;
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_HOST = SQL_HOST;
 
  /**
   * Constante: hôte de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_PASS = SQL_PASS;
 
  /**
   * Constante: nom de la bdd
   *
   * @var string
   */
  const DEFAULT_SQL_DB = SQL_DB;
 
  /**
   * Constructeur
   *
   * @param void
   * @return void
   * @see PDO::__construct()
   * @access private
   */
  private function __construct()
  {
    $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DB.';host='.self::DEFAULT_SQL_HOST.';charset=utf8',self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
	// $this->PDOInstance = 'mysql:host='.self::DEFAULT_SQL_HOST.';dbname='.self::DEFAULT_SQL_DTB.';charset=utf8';
	// $this->PDOInstance = new PDO($this->PDOInstance, self::DEFAULT_SQL_USER, self::DEFAULT_SQL_PASS);
  }
 
   /**
    * Crée et retourne l'objet SPDO
    *
    * @access public
    * @static
    * @param void
    * @return SPDO $instance
    */
  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new SPDO();
    }
    return self::$instance;
  }
 
  /**
   * Exécute une requête SQL avec PDO
   *
   * @param string $query La requête SQL
   * @return PDOStatement Retourne l'objet PDOStatement
   */
  public function query($query)
  {  
    return $this->PDOInstance->query($query);
  }
  
  public function exec($exec)
  {  
    return $this->PDOInstance->exec($exec);
  } 
   public function lastInsertId()
  {  
    return $this->PDOInstance->lastInsertId();
  } 
}