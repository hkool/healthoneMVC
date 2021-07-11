<?php

namespace Model;
include_once ('Model/Medicijn.php');
include_once ('Model/Recept.php');
class Model {

    private $database;

    public function makeConnection(){
        $this->database = new \PDO('mysql:host=localhost;dbname=health-one', "root", "");
    }
    //zorgt ervoor dat je medicijnen kan toevoegen
    public function insertMedicijn($naam,$omschrijving,$bijwerkingen,$prijs){
        $this->makeConnection();
        if($naam !='')
        {
            $query = $this->database->prepare (
                "INSERT INTO `medicijnen` (`id`, `naam`, `omschrijving`, `bijwerkingen`, `prijs`) 
                VALUES (NULL, :naam, :omschrijving, :bijwerkingen, :prijs)");
            $query->bindParam(":naam", $naam);
            $query->bindParam(":omschrijving", $omschrijving);
            $query->bindParam(":bijwerkingen",$bijwerkingen);
            $query->bindParam(":prijs",$prijs);
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
    //zorgt ervoor dat je de medicijnen kunt wijzigen
    public function updateMedicijn($id,$naam,$omschrijving,$bijwerkingen,$prijs){
        $this->makeConnection();

        // id moet worden toegevoegd omdat de id in de databse wordt gezocht
        $query = $this->database->prepare (
            "UPDATE `medicijnen` SET `naam` = :naam, `omschrijving`=:omschrijving, `bijwerkingen` = :bijwerkingen, `prijs` = :prijs
            WHERE `medicijnen`.`id` = :id ");
        $query->bindParam(":id", $id);
        $query->bindParam(":naam", $naam);
        $query->bindParam(":omschrijving", $omschrijving);
        $query->bindParam(":bijwerkingen",$bijwerkingen);
        $query->bindParam(":prijs",$prijs);
        $result = $query->execute();
        return $result;
    }
    //zorgt ervoor dat je de medicijnen kunt oproepen
    public function getMedicijnen(){

        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM `medicijnen`');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,\model\Medicijn::class);
            
            return $result;
        }
        return null;
    }

    public function selectMedicijn($id){

        $this->makeConnection();
        $selection = $this->database->prepare(
            'SELECT * FROM `medicijnen` 
            WHERE `medicijnen`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        if($result){
            $selection->setFetchMode(\PDO::FETCH_CLASS, \model\Medicijn::class);
            $medicijn = $selection->fetch();
            return $medicijn;
        }
        return null;
    }
    //zorgt ervoor dat je de medicijn kunt verwijderen
    public function deleteMedicijn($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'DELETE FROM `medicijnen` 
            WHERE `medicijnen`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        return $result;
    }
    //zorgt ervoor dat je kan inloggen
    //Inlog = Gebruikersnaam: Achternaam, Wachtwoord = welkom123
    public function getLogin($username, $wachtwoord){
        try{
            $this->makeConnection();
            $encryptwachtwoord = hash('sha256', $wachtwoord);
            $query = $this->database->prepare("SELECT * FROM `apotheker` WHERE `username` = :username");
            $query->bindParam(":username", $username);
            $result = $query->execute();
            if($result){
                $query->setFetchMode(\PDO::FETCH_CLASS,Apotheker::class);
                $apotheker = $query->fetch();
                if($apotheker){
                    if($encryptwachtwoord == $apotheker->__get('wachtwoord')){
                        $_SESSION['username'] = $apotheker->username;
                        $_SESSION['naam'] = $apotheker->naam;
                    }
                    else {
                        echo "Wrong password or username!";
                    }
                }
            }
        }
        catch(PDOExeption $e) {
            echo("Error!:".$e->getMessage());
        }
    }
    //Zorgt ervoor dat je de sessie wordt gewist
    public function getLogout(){
        session_unset();
        
    }
    //Zorgt ervoor dat je recepten kunt toevoegen
    public function insertRecept($medicijnid, $patientid, $dosis, $looptijd, $datum, $herhaling, $aantal){
        $this->makeConnection();
        if($naam !='')
        {
            $query = $this->database->prepare (
                "INSERT INTO `recepten` (`id`, `medicijnid`, `patientid`, `dosis`, `looptijd`, `datum`, `herhaling`, `aantal`) 
                VALUES (NULL, :medicijnid, :patientid, :dosis, :looptijd, :datum, :herhaling, :aantal)");
            $query->bindParam(":medicijnid", $medicijnid);
            $query->bindParam(":patientid", $patientid);
            $query->bindParam(":dosis",$dosis);
            $query->bindParam(":looptijd",$looptijd);
            $query->bindParam(":datum",$datum);
            $query->bindParam(":herhaling",$herhaling);
            $query->bindParam(":aantal",$aantal);
            $result = $query->execute();
            return $result;
        }
        return -1;
    }
    //Zorgt ervoor dat je recepten kunt wijzigen
    public function updateRecept($id, $medicijnid, $patientid, $dosis, $looptijd, $datum, $herhaling, $aantal){
        $this->makeConnection();
        // id moet worden toegevoegd omdat de id in de databse wordt gezocht
        $query = $this->database->prepare (
            "UPDATE `recepten` SET `medicijnid` = :medicijnid, `patientid`=:patientid, `dosis` = :dosis, `looptijd` = :looptijd, `datum` = :datum, `herhaling` = :herhaling, `aantal` = :aantal,
            WHERE `recepten`.`id` = :id ");
        $query->bindParam(":id", $id);
        $query->bindParam(":medicijnid", $medicijnid);
        $query->bindParam(":patientid", $patientid);
        $query->bindParam(":dosis",$dosis);
        $query->bindParam(":looptijd",$looptijd);
        $query->bindParam(":datum",$datum);
        $query->bindParam(":herhaling",$herhaling);
        $query->bindParam(":aantal",$aantal);
        $result = $query->execute();
        return $result;
    }
    //zorgt ervoor dat je de recepten kunt oproepen
    public function getRecepten(){

        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM `recepten`');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,\model\Recept::class);
            return $result;
        }
        return null;
    }
    public function selectRecept($id){

        $this->makeConnection();
        $selection = $this->database->prepare(
            'SELECT * FROM `recepten` 
            WHERE `recepten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        if($result){
            $selection->setFetchMode(\PDO::FETCH_CLASS, \model\Recept::class);
            $medicijn = $selection->fetch();
            return $medicijn;
        }
        return null;
    }
    //zorgt ervoor dat je de medicijn kunt verwijderen
    public function deleteRecept($id){
        $this->makeConnection();
        $selection = $this->database->prepare(
            'DELETE FROM `recepten` 
            WHERE `recepten`.`id` =:id');
        $selection->bindParam(":id",$id);
        $result = $selection ->execute();
        return $result;
    }
}
