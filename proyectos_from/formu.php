<?php
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$genero = $_POST['genero'];
$email  = $_POST['email'];
$telefono = $_POST['telefono'];
$materia = $_POST['materia'];

//ISSET VERIFICA SI UNA VARIABLES ESTA CONFIGURADA Y NO ES NULL
//EMPTY() ES UNA FUNCION QUE VERIFICA SI UNA VARIABLE ESTA VACIA
//NO GENERA UNA ADVERTENCIA
if(!empty($nombre) || !empty($password) || !empty($genero) || !empty($email)  || !empty($telefono) || !empty($materia) ) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "estudiante";
    //se crea una variable $conn (coneccion) dentro del parentesis se pone todos los datos
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    //Si existe algun error en el camino
    //msqli_connect_error => nos devuelve la descripcion del error
    if(mysqli_connect_error()){
        //die funcion de salida nos ayuda a buscar el error
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    //llamar los datos
    //Sentencias preparadas:  mejoran la seguridad y permiten la repeticion de sentencias para una mejora del rendimiento.
    //Reducen en tiempo de analisis ya que la preparacion de la consulta se realiza una sola vez
    //(Aunque la sentencia se ejecute las veces necesarias).
    else{
        /*nuestra consulta va entre comillas
        una dato que nose va repetir
        tomaremos el dato como referencia-> telefono que se encuentra en la tabla usuario donde solo se admite un valor
        ? = se pone interrogante porque no se que parametro pondra en el futuro */
        $SELECT = "SELECT telefono from usuario where telefono = ? limit 1";
        /*
        que pasa con los demas datos =  usamos la consulta inseRt para meter datos
        como no se que valores se ingresaran pondre seis interrogantes
        */
        $INSERT = "INSERT INTO usuario (nombre, password, genero, email, telefono, materia)values(?,?,?,?,?,?)";
        /*
        HAREMOS QUE FUNCIONE NUESTRA VARIABLE SELECT Y NUESTRA VARIABLE INSERT
        EN EL INSERT TENGO TODOS LOS DATOS, PERO EN EL SELECT TENGO UN DATO DE SEGURIDAD EN ESTE CASO NUMERO TELEFONICO
         */
        /*
        COMENZAREMOS CON UN NOMBRE ESPECIFICO IDENTIFICADOR , el identificador puede ser el nombre que quieras pero generalmente en los libros lo vamos a conoceer como $stmt       
        */

        /*PIMER LUGAR, DONDE QUIERO QUE FUNCIONE NUESTRA CONSULTA PREPARADA, EN LA CONEXION DE NUESTRA BASE DE DATOS
        cON EL TEMA DE ORIENTADO A OBJETOS VAMOS A LLAMAR A CADA UNO DE ESTOS OBJETOS "SELECT TIENE TODO LOS ATRIBUTOS E INSERT QUE TIENES LOS OTROS ATRIBUTOS" CON PREPARE VAMOS A DAR INICIO A LA SENTENCIA PREPARADA*/
        $stmt = $conn->prepare($SELECT);
        /*
        BIND_PARAm ponemos el parametro de la sentencia select osea telefono(tipo de dato, variable)
         */
        $stmt ->bind_param("i", $telefono);
        /*
        con execute vamos a permitir que se ejecute la sentencia en la base de datos
        */
        $stmt ->execute();
        /*
        vamos a ver los resultados(la misma variable que manejas arriba) para nuestra medida de seguridad
         */
        $stmt ->bind_result($telefono);
        //TRANSFIERE EL CONJUNTO DE RESULTADOS DE LA ULTIMA CONSULTA
        $stmt ->store_result();
        //PARA APILARLO EN LA BASE DE DATOS
        //NUM_ROWS: REGRESE EL NUMERO DE FILAS QUE TENEMOS EN LA SENTENCIA
        $rnum =$stmt -> num_rows;
        if($rnum == 0){
            //SELLA LA CONEXCION DE LA BASE DE DATOS 
            $stmt -> close();
            //LLENAR LOS DATOS 
            $stmt = $conn->prepare($INSERT);
            //PARAMETRO
            $stmt -> bind_param("ssssis",$nombre ,$password, $genero, $email, $telefono, $materia);
            //EJECUTAR
            $stmt -> execute();
            //IMPRIMIR
            echo"REGISTRO COMPLETADO.";
        }
        else{
            echo "alguien registro ese numero.";
        }
        //CERRAMOS STMT
        $stmt->close();
        //CERRAMOS LA CONEXCION DE LA BASE DE DATOS
        $conn->close();
    }
}
else {
    echo "todos los datos son obligatorios";
    die();//equivalente a un exit
}


?>