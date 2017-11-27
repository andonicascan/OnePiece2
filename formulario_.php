<?php
		include 'cab.htmlcode.php';
?>
<html>
	<head>
		<title>Coches</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body background="fotos\image5.jpg">

	
<?php echo $_SESSION['nombredelcampo']; ?>
<?php
if ( !isset($_POST['Usuario']) ) {
?>    
	<center>
    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post" id="letra1">
    	Fecha: <input type="" name="Fecha" size="8" /><br/>
	Usuario: <input type="text" name="Usuario" size="25" maxlength="15" /><br/>
        Contraseña: <input type="password" name="Contraseña" size="20" maxlength="15" /><br/>
        Nombre: <input type="text" name="Nombre" size="25" maxlength="15" /><br/>
        Apellidos: <input type="text" name="Apellidos" size="25" maxlength="50" /><br/>
        Email: <input type="text" name="Email" size="25" maxlength="50" /><br/>
        Edad: <input type="text" name="Año" size="1" maxlength="2" /><br/>
        Provincia: <input type="text" name="CodCoche" size="5" /><br/>
        Ciudad: <input type="text" name="Modelo" size="20" maxlength="15" /><br/>
        Novedades: <input type="checkbox" value="Acepto" /><br/>
        <input type="submit" name="env" value="Registrar"/>
    </form>	
	</center>   
<?php
}
else{
    $username = $_SESSION['root'];
    $password = $_SESSION['root'];
    $servername = localhost;
    $database = users;
    $table = Suscripciones; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";  
    
    $sql = "INSERT INTO ".$table." [(Usuario)] VALUES (".$_POST['Usuario']."',".$_POST['Contraseña'].",".$_POST['Nombre'].",'".$_POST['Apellidos']."',".$_POST['Email'].",".$_POST['Edad'].",'".$_POST['Provincia']."',".$_POST['Ciudad'].")";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Registro completado.<br/>";
?>	
<input type="submit" value="Otro formulario" onclick = "location='formulario.php'"/>
<?php
    }
catch(PDOException $e) {
    if ($e->getCode() == "23000")
        echo "Imposible insertar el registro porque el codigo del coche ya existe."."<br/>";
    else
        echo $e->getMessage();
}
}  
 //print "<br/><br/><br/>sql: ".$sql;
?>

		<div>
		        <?php
			include 'pie.htmlcode.php';
		        ?>
		</div>
		
	</body>
</html>
