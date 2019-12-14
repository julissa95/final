<?php
//die();
session_start();
$facturatotal=0;
$miObjeto = new stdClass();
$miObjeto->Factura = $_GET['patente'];
$miObjeto->precioPorHora=100;
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaSalida = mktime(); 
$Bandera=1;
//var_dump($miObjeto);
//die();



    //echo '<body style="background-color:white">';

    echo '<body style="background-color:#FF5733">';





if(!($iden =  mysqli_connect("localhost", "root", "","phpdatabase"))) 
    die("Error: No se pudo conectar");

$sentencia = "SELECT
  FechaIngreso AS 'FechaIngreso',
  NOW(),
  TIMESTAMPDIFF(SECOND,FechaIngreso,NOW()) AS 'DateDiff'
  FROM patente
  WHERE patente_V = '$miObjeto->Factura'";

if($result=mysqli_query($iden,$sentencia)){
   while ($obj=mysqli_fetch_object($result))
        {
        
            $tiempo=$obj->DateDiff/60;
            $facturatotal=$tiempo*100;
            
           
        }
      // Free result set
      mysqli_free_result($result);
}

mysqli_close($iden);

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo "<div align=\"center\" style='font-size:300%; color:#000000'>El precio a pagar es:</div>";
echo "<div align=\"center\" style='font-size:300%; color:#000000'>  Pesos $$facturatotal </div>";
//echo $facturatotal;

?>
