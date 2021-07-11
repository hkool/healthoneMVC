<?php

namespace Model;

class Medicijn {
    private $id;
    private $naam;
    private $omschrijving;
    private $bijwerkingen;
    private $prijs;

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