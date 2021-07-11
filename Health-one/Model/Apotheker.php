<?php

namespace Model;

class Apotheker {
    private $naam;
    private $beroep;
    private $straat;
    private $postcode;
    private $plaats;
    private $email;
    private $telefoonnummer;
    private $username;
    private $wachtwoord;

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
