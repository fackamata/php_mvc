<?php

namespace App;

use PDO, PDOException;

class Database
{
    private $db_dsn;
    private $db_user;
    private $db_pass;
    private $pdo;

    public function __construct(
        $db_dsn = "mysql:host=localhost;dbname=DB",
        $db_user = "webflix2",
        $db_pass = "12345678"
    ) {
        $this->db_dsn = $db_dsn;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    private function getPDO(){
        if ($this->pdo === null) {
            try {
                $db = new PDO($this->db_dsn, $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Oups PDO error: " . $e->getMessage();
            }
            // on initialise PDO
            $this->pdo = $db;
        }

        return $this->pdo;
    }

    /**
     * fonction qui effectue la requête dans la base de données
     */
    public function query($statement, $class, $param=[]){
        $stmt = $this->getPDO()->prepare($statement);
        $stmt->execute($param);
        // FETCH_CLASS pointe vers une classe, ici $class
        $result = $class === null ? $stmt->fetch(PDO::FETCH_OBJ) : $stmt->fetchAll(PDO::FETCH_CLASS,$class) ;
        return $result;
    }

}
