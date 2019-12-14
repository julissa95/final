<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="mario.ico">

    <title>Trabajo practicos</title>
    <link href="bootstrap.min.css" rel="stylesheet">

    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body style="background-color:#FF5733">


    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Julissa Joseph</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </nav>
    </header>
    <main role="main" class="container">
    <h1>Vehiculos estacionados</h1>
    
    
      <?php
      $facturatotal=0;
    //   if(isset($_SESSION['Nombre']))
    //   {

      echo '<table border=2><tr>';
      echo '<td>Patente</td><td>Fecha Ingreso</td>';
      echo '</tr>';
      
      	$con=mysqli_connect("localhost", "root", "","phpdatabase");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$sql="SELECT * FROM patente ORDER BY FechaIngreso DESC";

		if ($result=mysqli_query($con,$sql))
		  {
		  while ($obj=mysqli_fetch_object($result))
		    {
		    

		       echo"<tr>"; 
	           echo '<td>'.$obj->patente_V.'</td>';
	           echo '<td>'.$obj->FechaIngreso.'</td>';
	          // echo $objeto->Factura. "<br>". "Total: ".$objeto->debe; 
	           echo"</tr>";

		    }
		  // Free result set
		  mysqli_free_result($result);
		}

		mysqli_close($con);
      ?>
     
    </main>

    <footer class="footer">
      <div class="container">
       <!-- <span class="text-muted">Place sticky footer content here.</span> -->
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>
