<?php
$MiObjeto=new stdClass();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaIngreso = date_create()->format('Y-m-d H:i:s');
$MiObjeto->Patente=$_GET['patente'];
$MiObjeto->fechaIngreso=$horaIngreso;
//var_dump($MiObjeto);
//die();
//$archivo = fopen('listadopatente.txt', 'a');
//fwrite($archivo,json_encode($MiObjeto)."\n");
//fclose($archivo);
	// Create connection
if(preg_match( "/[[A-Za-z]{3}[0-9]{3}/" , $MiObjeto->Patente)){
    $conn = new mysqli("localhost", "root", "", "phpdatabase");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "insert into  patente (patente_V, FechaIngreso) VALUES ('$MiObjeto->Patente','$MiObjeto->fechaIngreso')";
     if ($conn->multi_query($sql) === TRUE) {
       
        header("Location: vehiculoEstacionado.php");
        exit();

    } else {
        $error= "Error: " . $sql . "<br>" . $conn->error;
        //header("Location: no.php");

        echo "<script>
                alert(".$error.");
                window.location.href='ingresarPatente.php';  
                </script>";
      
    }

    $conn->close();

}
else{
    echo "Por favor ingrese un patente valido con formato :AAA999";
}


?>