<?php
include_once "Cliente.php";
include_once "Prestamo.php";
include_once "Cuota.php";
include_once "Financiera.php";


class Financiera{

    private $denominacion;
    private $direccion;
    private $colecPrestamos;

    public function __construct($denominacion, $direccion){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colecPrestamos = array();
    }

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColecPrestamos(){
        return $this->colecPrestamos;
    }
    public function setColecPrestamos($colecPrestamos){
        $this->colecPrestamos = $colecPrestamos;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function otorgarPrestamo($cliente, $cantCuotas, $monto, $tazaInteres){

        $prestamo = new Prestamo($monto, $cantCuotas, $tazaInteres, $cliente);
        
        
        $prestamos = $this->getColecPrestamos();
        $prestamos[] = $prestamo;

        $this->setColecPrestamos($prestamos);

    }

    public function otorgarPrestamoSiCalifica(){

        for($i = 0; $i < count($this->getColecPrestamos()); $i++){
            if(count($this->getColecPrestamos()[$i]->getColecCuotas()) == 0){

                if(($this->getColecPrestamos()[$i]->getMonto() / $this->getColecPrestamos()[$i]->getCantidadCuotas()) <= ($this->getColecPrestamos()[$i]->getMonto() * 0.4)){
                    $this->getColecPrestamos()[$i]->otorgarPrestamo();
                }
            }
        }

    }

    public function informarCuotaPagar($idPrestamo){

        $encontrado = false;
        $i = 0;;
        $referencia = null;
        while(!$encontrado && $i < count($this->getColecPrestamos())){

            if($this->getColecPrestamos()[$i]->getIdentificacion() == $idPrestamo){
                $encontrado = true;
                $referencia =$this->getColecPrestamos()[$i]->darSiguienteCuotaPagar();
                //esto en pedco lo hice mal y me di cuenta cuando lo entregue :(
            }
            $i++;
            
        }
        return $referencia;


        
    }



    public function __toString() {
        $cadena = "Financiera: " . $this->getDenominacion() . "\n";
        $cadena .= "Dirección: " . $this->getDireccion() . "\n";
        $cadena .= "Préstamos otorgados:\n";
    
        foreach ($this->getColecPrestamos() as $prestamo) {
            $cadena .= $prestamo->__toString() . "\n";
        }
    
        return $cadena;
    }
    
}
