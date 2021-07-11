<?php

namespace Model;

class Recept {
    private $id;
    private $medicijnid;
    private $patientid;
    private $dosis;
    private $looptijd;
    private $datum;
    private $herhaling;
    private $aantal;

    
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