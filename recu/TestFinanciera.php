<?php

include_once 'Cliente.php';
include_once 'Prestamo.php';
include_once 'Cuota.php';
include_once 'Financiera.php';

$persona1 = new Cliente("Pepe", "florez", "12345678", "Bs As 12", "dir@mail.com", "299444567", 40000);
$persona2 = new Cliente("Luis", "Suares", "12345679", "Bs As 123", "dire@mail.com", "2994455", 4000);


$Financiera1 = new Financiera("ElectroCash", "Av. Arg 1234");

$prestamo1= new Prestamo(50000, 5, 10, $persona1,);
$prestamo2= new Prestamo(10000, 4, 10, $persona2);
$prestamo3= new Prestamo(10000, 2, 10, $persona2);

$Financiera1->otorgarPrestamo($prestamo1->getSolicitantePrestamo(), $prestamo1->getCantidadCuotas(), $prestamo1->getMonto(), $prestamo1->getTazaInteres());
$Financiera1->otorgarPrestamo($prestamo2->getSolicitantePrestamo(), $prestamo1->getCantidadCuotas(), $prestamo1->getMonto(), $prestamo1->getTazaInteres());
$Financiera1->otorgarPrestamo($prestamo3->getSolicitantePrestamo(), $prestamo1->getCantidadCuotas(), $prestamo1->getMonto(), $prestamo1->getTazaInteres());

echo $Financiera1;

$Financiera1->otorgarPrestamoSiCalifica();

echo $Financiera1;

$objCuota = $Financiera1->informarCuotaPagar(2);

echo $objCuota;

echo $objCuota->darMontoFinalCuota();




