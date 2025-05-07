<?php

class Cliente{

    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $email;
    private $telefono;
    private $importeNeto;


    public function __construct($nombre, $apellido, $dni, $direccion, $email, $telefono, $importeNeto){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->importeNeto = $importeNeto;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDni(){
        return $this->dni;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getImporteNeto(){
        return $this->importeNeto;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setImporteNeto($importeNeto){
        $this->importeNeto = $importeNeto;
    }

    public function __toString() {
        return "Cliente:\n" .
               "Nombre: " . $this->getNombre() . " " . $this->getApellido() . "\n" .
               "DNI: " . $this->getDni() . "\n" .
               "Dirección: " . $this->getDireccion() . "\n" .
               "Email: " . $this->getEmail() . "\n" .
               "Teléfono: " . $this->getTelefono() . "\n" .
               "Importe Neto: $" . $this->getImporteNeto();
    }
    

    


}