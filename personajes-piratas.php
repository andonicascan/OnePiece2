<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS\Estilo2.css" type="text/css">
</head>
<body background="Imagenes\OP_Fondo.png">
    
<h1 align="center"><a href="index.htm"><img src="Imagenes\OP_Header.gif"></a></h1>
    
<div class="topnav">
  <a href=index.htm>Inicio</a>
	<div class="dropdown">
    <button class="dropbtn">Personajes</button>
    <div class="dropdown-content">
      <a class="active" href=personajes-piratas.php>Piratas</a>
      <a href=personajes-marines.php>Marines</a>
	  <a href=personajes-realeza.php>Realeza</a>
    </div>
  </div>
	<a href=conocenos.htm>Conócenos</a>
	<a href=contactar.php>Contactar</a>
</div>
<center>
<?php
$username = root;
$password = root;
$servername = localhost;
$database = Personajes;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexión con la base de datos $database del servidor $servername reali.<br/>";
    $sql = "SELECT * FROM Piratas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result_array = $stmt->fetchAll();
    print "<table border='1px solid grey'>";
    print "<tr>";
    print "<th>";print "Nombre";print "</th>";
    print "<th>";print "Afiliación";print "</th>";
    print "<th>";print "Ocupación";print "</th>";
    print "<th>";print "Recompensa";print "</th>";
    print "<th>";print "Fruta Del Diablo";print "</th>";
    print "<th>";print "Estado";print "</th>";
    print "</tr>";
    foreach ( $result_array as $linea ) {
        print "<tr>";
        print "<td>";print $linea['Nombre'];print "</td>";
        print "<td>";print $linea['Afiliación'];print "</td>";
        print "<td>";print $linea['Ocupación'];print "</td>";
        print "<td>";print $linea['Recompensa'];print "</td>";
        print "<td>";print $linea['Fruta Del Diablo'];print "</td>";
        print "<td>";print $linea['Estado'];print "</td>";
        print "</tr>";
    }
    print "</table>";
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
</center>
<div class="footer">
  <a href="https://twitter.com/es_fandom"><i class="fa fa-facebook-official"></i></a>
  <a href="https://www.facebook.com/Fandom.espanol/"><i class="fa fa-twitter"></i></a>
  <div class="w3-medium">
  Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
  </div>
</body>
</html>
