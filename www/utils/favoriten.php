<?php

class Favoriten {

    /**
     * Benutzer einloggen
     * 
     * Wenn email und passwort in der DB gefunden werden, wird ein Array mit id, name und email zurueckgegeben.
     * 
     * @param $email string
     * @param $password string
     * 
     * @return $user Array
     */
    public function login($email, $password){
        if(isset($username) && isset($password)){
            $db = new DbConnection();
            $connection = $db->createConnection();
            $stmt = $connection->prepare("SELECT 'id', 'name', 'email' FROM benutzer WHERE email = ? AND password = ?");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $connection->close();
                return $row;
            } else {
                $connection->close();
                die('Die Kombination aus E-Mail Adresse und Passwort sind nicht gültig!');
            }
        }
    }
}

class DbConnection{

    private $server = 'localhost';
    private $port = '3306';
    private $db = '';
    private $user = '';
    private $pass = '';

    public function createConnection(){
        $con = new mysqli($this->server, $this->user, $this->pass, $this->db, $this->port);
        if($con->connect_error){
            die('Fehler beim Verbinden zur Datenbank: ' . $con->connect_error);
        }
        return $con;
    }
}