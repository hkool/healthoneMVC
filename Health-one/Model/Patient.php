<?php

namespace Model;

class Patient {
    private $id;
    private $naam;
    private $zknummer;
    private $adres;
    private $stad;
    private $email;
    private $telefoonnummer;
    private $verzekering;
    private $geboortedatum;

    
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}