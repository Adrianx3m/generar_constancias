<?php
ob_start();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$numero=$_GET['telefono'];
?>
<html>
<head></head>
<style>
@font-face {
  font-family: amsterdam;
  font-stretch: normal;
  src:
    url("fonts/Amsterdam.ttf") format('truetype');
}
img{
	position:fixed;
	top:0px;
	    display: block;
    padding: 0!important;
    width: 100%!important;
    height: auto;
}
h1{
	position:absolute; 
	
	/* En el siguiente código css se elige el color del texto del nombre, colocar el código del color */
	color:#000E51;
	
	/* En el siguiente código se modifica la posición en Y, entre menor número mas arriba se va
	al momento de modificar este valor revisar constante mente el pdf generado ya que posiblemente se mueva 
	un poco a la derecha, si es el caso modificar el segundo valor de la variable margin
	*/
	height:900px;
	
	/* En el siguiente codigo css se pociciona el texto el primer valor (-17px) no se modifica,
	solo el segundo mientras mas grande el numero mas a la derecha se va  350*/
	margin:-17px 380px; 
	
	
	font-size:45px;

	 -webkit-transform:rotate(270deg);
    -moz-transform:rotate(270deg);
    -ms-transform:rotate(270deg);
    -o-transform:rotate(270deg);
    transform:rotate(270deg);
    transform-origin: 50%;
    width: 750px;
}
</style>
<body>
<center>

<img src="img/constancia2.png">
<h1 style="	font-family: amsterdam;"><?php echo "$numero"; ?></h1>
</center>
</body>
</html>
<?php

$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$dompdf->set_paper("A4", "landscape");
$pdf=$dompdf->output();
$filename="".$numero.".pdf";
file_put_contents($filename,$pdf);
$dompdf->stream($filename);

?>