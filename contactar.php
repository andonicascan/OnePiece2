<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS\Estilo.css" type="text/css">
</head>
<body background="Imagenes\OP_Fondo.png">
    
<h1 align="center"><a href="index.htm"><img src="Imagenes\OP_Header.gif"></a></h1>
    
<div class="topnav">
  <a href=index.htm>Inicio</a>
  <div class="dropdown">
    <button class="dropbtn">Personajes</button>
    <div class="dropdown-content">
      <a href=personajes-piratas.php>Piratas</a>
      <a href=personajes-marines.php>Marines</a>
	  <a href=personajes-realeza.php>Realeza</a>
    </div>
  </div>
  <a href=conocenos.htm>Conócenos</a>
  <a class="active" href=contactar.php>Contactar</a>
</div>

<h2 align="center"><u>Inscripción al boletín de Información</u></h2>
<?php
if ( !isset($_POST['env']) ) {
?>  

    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
	Usuario: <input type="text" name="Usuario" size="25" maxlength="15" /><br/>
        Contraseña: <input type="password" name="Contraseña" size="20" maxlength="15" /><br/>
        Nombre: <input type="text" name="Nombre" size="25" maxlength="15" /><br/>
        Apellidos: <input type="text" name="Apellidos" size="25" maxlength="50" /><br/>
        Email: <input type="text" name="Email" size="25" maxlength="50" /><br/>
        Edad: <input type="text" name="Edad" size="1" maxlength="2" /><br/>
        Provincia: <select name="Provincia">
<option selected></option>
<option>Araba</option>
<option>Albacete</option>
<option>Alicante</option>
<option>Almería</option>
<option>Asturias</option>
<option>Ávila</option>
<option>Badajoz</option>
<option>Barcelona</option>
<option>Burgos</option>
<option>Cáceres</option>
<option>Cádiz</option>
<option>Cantabria</option>
<option>Castellón</option>
<option>Ciudad Real</option>
<option>Córdoba</option>
<option>Cuenca</option>
<option>Girona</option>
<option>Granada</option>
<option>Guadalajara</option>
<option>Gipuzkoa</option>
<option>Huelva</option>
<option>Huesca</option>
<option>Islas Baleares</option>
<option>Jaén</option>
<option>A Coruña</option>
<option>La Rioja</option>
<option>Las Palmas</option>
<option>León</option>
<option>Lleida</option>
<option>Lugo</option>
<option>Madrid</option>
<option>Málaga</option>
<option>Murcia</option>
<option>Navarra</option>
<option>Ourense</option>
<option>Palencia</option>
<option>Pontevedra</option>
<option>Salamanca</option>
<option>Segovia</option>
<option>Sevilla</option>
<option>Soria</option>
<option>Tarragona</option>
<option>Tenerife</option>
<option>Teruel</option>
<option>Toledo</option>
<option>Valencia</option>
<option>Valladolid</option>
<option>Bizkaia</option>
<option>Zamora</option>
<option>Zaragoza</option>
</select><br/>
        Ciudad: <input type="text" name="Ciudad" size="20" maxlength="15" /><br/>
        Novedades: <input type="checkbox" value="1" name="Novedades"/><br/>
        <input type="submit" name="env" value="Registrar"/>
    </form>	

<?php
}
else{
    $username = root;
    $password = root;
    $servername = localhost;
    $database = Users;
    $table = Suscripciones; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";
    echo "Usuario: ".$_POST['Usuario']."<br/>";
    echo "Nombre:".$_POST['Nombre']."<br/>";    
    echo "Apellidos: ".$_POST['Apellidos']."<br/>";
    echo "Email: ".$_POST['Email']."<br/>";
    echo "Edad: ".$_POST['Edad']."<br/>";
    echo "Provincia: ".$_POST['Provincia']."<br/>";
    echo "Ciudad: ".$_POST['Ciudad']."<br/>";
    echo "Novedades: ".$_POST['Novedades']."<br/>";
   
    $sql = "INSERT INTO ".$table."(Usuario,Contraseña,Nombre,Apellidos,Email,Edad,Provincia,Ciudad,Novedades) VALUES ('".$_POST['Usuario']."','".$_POST['Contraseña']."','".$_POST['Nombre']."','".$_POST['Apellidos']."','".$_POST['Email']."',".$_POST['Edad'].",'".$_POST['Provincia']."','".$_POST['Ciudad']."',".$_POST['Novedades'].")";
    $stmt = $conn->prepare($sql);
    //echo $sql;    
    $stmt->execute();
    echo "Registro Completado.<br/>";
    }
catch(PDOException $e) {
    if ($e->getCode() == "23000")
        echo "Imposible crear usuario porque ya existe."."<br/>";
    else
        echo $e->getMessage();
}
}    
 //print "<br/><br/><br/>sql: ".$sql;
?>

<div class="footer">
  <a href="https://twitter.com/es_fandom"><i class="fa fa-facebook-official"></i></a>
  <a href="https://www.facebook.com/Fandom.espanol/"><i class="fa fa-twitter"></i></a>
  <div class="w3-medium">
  Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a>
  </div>
</div>
</body>
</html>
