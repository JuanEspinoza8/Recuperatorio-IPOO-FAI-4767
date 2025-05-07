<?php

class Prestamo{

    private $identificacion;
    private $codigoElectrodomestico;
    private $fechaOtorgamiento;
    private $monto;
    private $cantidadCuotas;
    private $tazaInteres;
    private $colecCuotas;
    private $solicitantePrestamo;

    private static $contadorPrestamos = 0;

    public function __construct($monto, $cantidadCuotas, $tazaInteres, $solicitantePrestamo){

        self::$contadorPrestamos++;
        $this->identificacion = self::$contadorPrestamos;

        $this->monto = $monto;
        $this->cantidadCuotas = $cantidadCuotas;
        $this->tazaInteres = $tazaInteres;
        $this->solicitantePrestamo = $solicitantePrestamo;

    }
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getCodigoElectrodomestico(){
        return $this->codigoElectrodomestico;

    }
    public function getFechaOtorgamiento(){
        return $this->fechaOtorgamiento;
    }
    public function getMonto(){
        return $this->monto;
    }
    public function getCantidadCuotas(){
        return $this->cantidadCuotas;
    }
    public function getTazaInteres(){
        return $this->tazaInteres;
    }
    public function getColecCuotas(){
        return $this->colecCuotas;
    }
    public function getSolicitantePrestamo(){
        return $this->solicitantePrestamo;
    }
    public function setCodigoElectrodomestico($codigoElectrodomestico){
        
    }
    public function setFechaOtorgamiento($fechaOtorgamiento){
        
    }
    public function setMonto($monto){
        
    }
    public function setCantidadCuotas($cantidadCuotas){
        
    }
    public function setTazaInteres($tazaInteres){
        
    }
    public function setColecCuotas($colecCuotas){
        
    }
    public function setSolicitantePrestamo($solicitantePrestamo){
        
    }

    public function calcularInteresesPrestamo($numCuota){

        return ($this->getMonto() - (($this->getMonto() / $this->getCantidadCuotas()) * ($numCuota - 1))) * ($this->getTazaInteres() / 100);



    }


    public function otorgarPrestamo(){
         
        $this->fechaOtorgamiento = date("d-m-y");

    
        $montoBase = $this->getMonto() / $this->getCantidadCuotas();

    
        $cuotas = [];

        for ($i = 1; $i <= $this->getCantidadCuotas(); $i++) {
            $interes = $this->calcularInteresesPrestamo($i);
            $montoTotalCuota = $montoBase + $interes;
            
            $cuota = new Cuota($i, $montoTotalCuota, $interes);

            $cuotas[]= $cuota;

        }
    
        $this->setColecCuotas($cuotas); 
    }

    public function darSiguienteCuotaPagar(){

        $i = 0;
        $encontrada = null;

        while($i < count($this->colecCuotas) && $encontrada == null){

            if($this->colecCuotas[$i]->getCancelada() == false){
                
                $encontrada = $this->colecCuotas[$i];
            }
            $i++;
            
        }

        return $encontrada;

    }

    public function __toString(){
        $info = "Préstamo N°: " . $this->getIdentificacion() . "\n" .
                "Código Electrodoméstico: " . ($this->getCodigoElectrodomestico() ?? "No asignado") . "\n" .
                "Fecha Otorgamiento: " . ($this->getFechaOtorgamiento() ?? "Aún no otorgado") . "\n" .
                "Monto Total: $" . $this->getMonto() . "\n" .
                "Tasa de Interés: " . $this->getTazaInteres() . "%\n" .
                "Cantidad de Cuotas: " . $this->getCantidadCuotas() . "\n" .
                "Solicitante: " . $this->getSolicitantePrestamo()->__toString() . "\n";
    
        
        if (count($this->getColecCuotas()) > 0) {
            $info .= "Cuotas:\n";
            foreach ($this->getColecCuotas() as $cuota) {
                $info .= $cuota->__toString() . "\n";
            }
        } else {
            $info .= "Cuotas: Aún no se han generado.\n";
        }
    
        return $info;
    }
    













}