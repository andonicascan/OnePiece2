<?php
if ( !isset($_POST['Usuario']) ) {
?>  

    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
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

<?php
}
else{
    $username = root;
    $password = root;
    $servername = localhost;
    $database = users;
    $table = Suscripciones; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";

    echo "Usuario: ".$_POST['Usuario']."<br/>";
    echo "Contraseña: ".$_POST['Contraseña']."<br/>";
    echo "Nombre:".$_POST['Nombre']."<br/>";    
    echo "Apellidos: ".$_POST['Apellidos']."<br/>";
    echo "Email: ".$_POST['Email']."<br/>";
    echo "Edad: ".$_POST['Edad']."<br/>";
    echo "Provincia: ".$_POST['Provincia']."<br/>";
    echo "Ciudad: ".$_POST['Ciudad']."<br/>";
    echo "Novedades: ".$_POST['Novedades']."<br/>";
    
    $sql = "INSERT INTO ".$table."(Usuario,Contraseña,Nombre,Apellido,Email,Edad,Provincia,Ciudad,Novedades) VALUES (".$_POST['Usuario']."',".$_POST['Contraseña'].",".$_POST['Nombre'].",'".$_POST['Apellidos']."',".$_POST['Email'].",".$_POST['Edad'].",'".$_POST['Provincia']."',".$_POST['Ciudad'].")";
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
 
