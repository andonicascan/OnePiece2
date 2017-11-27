<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/mystile.css">
<title>Panaderia pandora</title>
<meta charset="UTF-8">
  <meta name="description" content="Probando bordes">
  <meta name="keywords" content="HTML, CSS, bordes">
  <meta name="author" content="root" >
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body bgcolor="#E2D0A8">
<h1 align="center"><strong><a href="Inicio.html"><img src="imagenes/Logopanaderia.jpg" width="265" height="161" /></a></strong></h1>

<div align="center">

<span id="liveclock"></span><script language="JavaScript" type="text/javascript">
 <!--

function show5(){
if (!document.layers&&!document.all&&!document.getElementById)
return

 var Digital=new Date()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds()

var dn="AM"
if (hours<24)
dn="PM"
if (hours>24)
hours=hours-24
if (hours==0)
hours=24

 if (minutes<=9)
 minutes="0"+minutes
 if (seconds<=9)
 seconds="0"+seconds
//change font size here to your desire
myclock="<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>"+hours+":"+minutes+":"
 +seconds+" "+dn+"</b></font>"
if (document.layers){
document.layers.liveclock.document.write(myclock)
document.layers.liveclock.document.close()
}
else if (document.all)
liveclock.innerHTML=myclock
else if (document.getElementById)
document.getElementById("liveclock").innerHTML=myclock
setTimeout("show5()",1000)
 }


window.onload=show5
 //-->
 </script>

</div>
<br />
<div class="topnav">
  <a href="index.html">Inicio</a>
  
      <div class="dropdown">
    <button class="dropbtn">Tipos de Panes</button>
    <div class="dropdown-content">
      <a href="enoferta.html">OFERTA</a>
      <a href="panesvariados.html">Panes variados</a>
      <a href="casero.html">Panes Caseros</a>
    </div>
  </div> 
    <a href="Conocenos.html">Conocenos</a>
    <a href="Contactanos.html">Contactanos</a>
    <a href="Clientes.php">Clientes</a>
    <a class="active" href="Registro.php">Registro</a>
      </div>
      
      <br />
         <?php
if ( !isset($_POST['Nombre']) ) {
?>
        
    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
        Nombre: <input type="text" name="Nombre" size="20" /><br/>
        Apellido: <input type="text" name="Apellido" size="20" /><br/>
        Poblacion: <input type="text" name="Poblacion" size="20" /><br/>
        CodigoPostal: <input type="text" name="CodigoPostal" size="10" /><br/>
        Provincia: <input type="text" name="Provincia" size="20" /><br/>
        Telefono: <input type="text" name="Telefono" size="9" /><br/>
        CorreoElectronico: <input type="text" name="CorreoElectronico" size="30" /><br/>
        <input type="submit" name="env" value="ENVIAR"/>
    </form>	  
    
<?php    
}
else {
    $username = root;
    $password = admin1234;
    $servername = localhost;
    $database = pandora;
    $table = registrados; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";
    
    echo "Nombre: ".$_POST['Nombre']."<br/>";
    echo "Apellido: ".$_POST['Apellido']."<br/>";
    echo "Poblancion:".$_POST['Poblacion']."<br/>";    
    echo "CodigoPostal: ".$_POST['CodigoPostal']."<br/>";
    echo "Provincia: ".$_POST['Provincia']."<br/>";
    echo "Telefono: ".$_POST['Telefono']."<br/>";
    echo "CorreoElectronico: ".$_POST['CorreoElectronico']."<br/>";
    
    $sql = "INSERT INTO ".$table."(Nombre,Apellido,Poblacion,CodigoPostal,Provincia,Telefono,CorreoElectronico) VALUES ('".$_POST['Nombre']."','".$_POST['Apellido']."','".$_POST['Poblacion']."','".$_POST['CodigoPostal']."','".$_POST['Provincia']."','".$_POST['Telefono']."','".$_POST['CorreoElectronico']."')";
    $stmt = $conn->prepare($sql);
	 //echo $sql;    
    $stmt->execute();
    echo "Cliente insertado correctamente.<br/>";
    }
catch(PDOException $e) {
    if ($e->getCode() == "23000")
        echo "Imposible insertar el registro porque esa clave ya existe."."<br/>";
    else
        echo $e->getMessage();
}
}    
 //print "<br/><br/><br/>sql: ".$sql;
?>
  

  <div class="footer">
No se admiten devoluciones y precios sin I.V.A.
Telefono de contacto: 943 65 32 13
Correo electronico: panaderiapandora@gmail.com
</div>
</body>
</html>
