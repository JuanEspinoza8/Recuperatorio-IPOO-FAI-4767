<?php
include_once "Cliente.php";
include_once "Prestamo.php";
include_once "Cuota.php";
include_once "Financiera.php";

class Cuota{

    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    public function __construct($numero, $montoCuota, $montoInteres){
        $this->numero = $numero;
        $this->montoCuota = $montoCuota;
        $this->montoInteres = $montoInteres;
        $this->cancelada = false;
        
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getMontoCuota(){
        return $this->montoCuota;
    }

    public function getMontoInteres(){
        return $this->montoInteres;
    }

    public function getCancelada(){
        return $this->cancelada;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setMontoCuota($montoCuota){
        $this->montoCuota = $montoCuota;
    }

    public function setMontoInteres($montoInteres){
        $this->montoInteres = $montoInteres;
    }

    public function setCancelada($cancelada){
        $this->cancelada = $cancelada;
    }

    public function darMontoFinalCuota(){
        return $this->montoCuota + $this->montoInteres;
    }

    public function __toString(){
        $estado = $this->getCancelada() ? "Cancelada" : "Pendiente";
        return "Cuota N°: " . $this->getNumero() . "\n" .
               "Monto Cuota: " . $this->getMontoCuota() . "\n" .
               "Monto Interés: " . $this->getMontoInteres() . "\n" .
               "Monto Final: " . $this->darMontoFinalCuota() . "\n" .
               "Estado: " . $estado . "\n";
    }
    






}