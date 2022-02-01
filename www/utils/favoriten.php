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
    public function login($email){
        if(isset($email)){
            $db = new DbConnection();
            $connection = $db->createConnection();
            $stmt = $connection->prepare("SELECT id, name, email, passwort FROM benutzer WHERE email = ?");
            $stmt->bind_param('s', $email);
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
    
    /**
     * Benutzer registrieren
     * 
     * Neuen Benutzer anlegen
     * 
     * @param $name string
     * @param $email string
     * @param $password string
     * 
     * @return $user Array
     */
    public function register($name, $email, $password){
        if(isset($email) && isset($password)){
            $db = new DbConnection();
            $connection = $db->createConnection();
            $stmt = $connection->prepare("INSERT INTO benutzer(name, email, passwort) VALUES (?, ?, ? )");
            $stmt->bind_param('sss', $name, $email, $password);
            $stmt->execute();
            
        }
    }

    public function erstelleListe($name, $privat){
        if(isset($name)){
            if(!isset($privat)){
                $privat = 1;
            }
            $db = new DbConnection();
            $connection = $db->createConnection();
            $stmt = $connection->prepare("INSERT INTO favoritenlisten(name, privat) VALUES (?, ? )");
            $stmt->bind_param('si', $name, $privat);
            $stmt->execute();
        }
    }
}

class DbConnection{

    private $server = '192.168.220.49';
    private $port = '3306';
    private $db = 'favoriten';
    private $user = 'root';
    private $pass = 'test';

    public function createConnection(){
        $con = new mysqli($this->server, $this->user, $this->pass, $this->db);
        if($con->connect_error){
            die('Fehler beim Verbinden zur Datenbank: ' . $con->connect_error);
        }
        return $con;
    }
}