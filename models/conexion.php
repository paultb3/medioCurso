<?php


    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';

    class conexion{
        private $host;
        private $namedb;
        private $userdb;
        private $passworddb;
        private $charset;

        private $pdo;

        public function __construct($host,$namedb,$userdb,$passworddb,$charset = 'utf8'){
            $this->host = $host;
            $this->namedb=$namedb;
            $this->userdb=$userdb;
            $this->passworddb=$passworddb;
            $this->charset=$charset;
            $this->conectar();
        }

        public function conectar(){
            $dsn = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";

            try{
                $this->pdo = new PDO($dsn, $this->userdb,$this->passworddb);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die('Hubo un error'.$e->getMessage());
            }
        }

        public function obtenerConexion(){
            return $this->pdo;
        }

        public function contesta(){
            $dsn = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
            return $dsn;
            
            //return $this->host.'|'.$this->namedb.'|'.$this->userdb.'|';
        }
    }

  
?>
