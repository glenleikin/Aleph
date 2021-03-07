<?php
include_once 'admin/conexion.php';
function loadPage($page){
    $page = $page.".php";
    include $page;
}

function showMessage($answer){
    switch($answer){
        case "0X001":
            $message = "<strong style=color:red> Verifique el campo de nombre </strong>";
            break;
        case "0X002":
            $message = "<strong style=color:red> Verifique el campo de email</strong>";
            break;
        case "0X003":
            $message = "<strong style=color:red> Verifique el campo de mensaje</strong>";
            break;
        case "0X004":
            $message = "<strong style=color:green> Contacto enviado correctamente </strong>";
            break;
        case "0X005":
            $message = "<strong style=color:red> No se puede enviar el correo </strong>";
            break;
        case "0X006":
            $message = "<strong style=color:green> Usuario registrado correctamente </strong>";
            break;
        case "0X007":
            $message = "<strong style=color:red> No se puede registrar el usuario </strong>";
            break;
        case "0X008":
            $message = "<strong style=color:green> Producto eliminado correctamente </strong>";
            break;
        case "0X009":
            $message = "<strong style=color:red> No se puede eliminar al producto </strong>";
            break;
        case "0X010":
            $message = "<strong style=color:green> Guardado correctamente </strong>";
            break;
        case "0X011":
            $message = "<strong style=color:red> No se puede guardar </strong>";
            break;
        case "0X012":
            $message = "<strong style=color:red> No se pudo conectar </strong>";
            break;
        case "0X013":
            $message = "<strong style=color:red> Usuario no registrado </strong>";
            break;
        case "0X014":
            $message = "<strong style=color:red> Clave incorrecta </strong>";
            break;
        case "0X015":
            $message = "<strong style=color:red> Debe ingresar primero </strong>";
            break;
        default:
            $message = "<strong style=color:red>No existe el codigo de error</strong>";
    }
    return $message;
}

function upgrade($idLibro, $estado){
    global $conexion;
    if($estado == 'Desactivar -'){
        $estado = 0;
    }else{
        $estado = 1;
    }
    $sql ="UPDATE libros SET Estado=? WHERE idLibro =?";
    $result = $conexion->prepare($sql);
    $result->bindParam(1, $estado, PDO::PARAM_INT);
    $result->bindParam(2, $idLibro, PDO::PARAM_INT);
    if($result->execute()){
        $answer="0X010";
    }else{
        $answer="0X011";
    }
    return $answer;
}

function showBooks(){
    $archivo = "listadoProductos.csv";
    if($x = fopen($archivo, "r")){
        while($datos = fgetcsv($x,1000,",")){
            ?>
				<img src="images/books/<?= $datos[0];?>.jpg" alt=""width="150px" height="220px"/>
				<h4><a href="#"><?php echo $datos[1]?></a></h4>
				<p>Año: <?= $datos[4];?>, <?= $datos[5];?>, Autor: <?= $datos[3];?></p>
				<span>Género: <?= $datos[2];?></span>
            <?php
        }
        fclose($x);
    }else{
        echo "Error no puedo abrir el archivo";
    }
}

function deleteBook($idLibro){
    try{
    global $conexion;  
    $sql = "DELETE FROM libros WHERE idLibro = ?";
    $result = $conexion->prepare($sql);
    $result->bindParam(1,$idLibro, PDO::PARAM_INT);
    //unlik("fichero");
    if($result->execute()){
        $answer="0X008";
    }else{
        $answer="0X009";
    }
    return $answer;
    }catch(PDOException $e){
        echo "error".$e->getMessage();
    }finally{
        $conexion = null;
    }
}

function authorList(){
    global $conexion;
    try {
        $sql = 'SELECT *FROM autor';
        $result = $conexion->prepare($sql);
        if ($result->execute()) {
            $info = $result->fetchAll();
            return $info;
        }
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    } finally {
        $conexion = null;
    }
}

function saveBook($info)
{
    global $conexion;
    $name = $info['name'];
    $genre = $info['genre'];
    $year = $info['year'];
    $author= $info['author'];
    $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    $imagen = $_FILES["imagen"]["name"];
    $dir ="../images/books";
    move_uploaded_file($tmp_imagen,"$dir/$imagen");
    $sql="INSERT INTO libros (Nombre,Genero,Autor,Anio,Imagen) VALUES (?,?,?,?,?)";
    $result = $conexion->prepare($sql);
    $result->bindParam(1, $name, PDO::PARAM_STR);
    $result->bindParam(2, $genre, PDO::PARAM_STR);
    $result->bindParam(3, $author, PDO::PARAM_INT);
    $result->bindParam(4, $year, PDO::PARAM_STR);
    $result->bindParam(5, $imagen, PDO::PARAM_STR);
    if($result->execute()){
        $answer="0X010";
    }else{
        $answer="0X011";
    }
    return $answer;
}

function saveAuthor($info)
{
    global $conexion;
    $name = $info['name'];
    $sql="INSERT INTO autor (Nombre) VALUES (?)";
    $result = $conexion->prepare($sql);
    $result->bindParam(1, $name, PDO::PARAM_STR);
    if($result->execute()){
        $answer="0X010";
    }else{
        $answer="0X011";
    }
    return $answer;
}

function recoverBook($idLibro)
{
    try {
        global $conexion;
        $sql = "SELECT *FROM libros WHERE idLibro=?";
        $result = $conexion->prepare($sql);
        $result->bindParam(1, $idLibro, PDO::PARAM_INT);
        if ($result->execute()) {
            $info = $result->fetch();
            return $info;
        }
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }
}

function bookEdit($info)
{
    try {
        global $conexion;
        $idLibro = $info['idLibro'];
        $nombre = $info['name'];
        $genero = $info['genre'];
        $anio = $info['year'];
        $autor = $info['author'];
        $imagenActual = $info['imagenActual'];
        $imagen = ($_FILES['imagen']['name'] == '') ? $info['imagenActual'] : $_FILES['imagen'];
        if (is_array($imagen)) {
            $nombreTmp = $imagen["tmp_name"];
            $dir = "../images/books";
            $nombreImg = $imagen["name"];
            unlink("../images/books/" . $imagenActual);
            move_uploaded_file($nombreTmp, "$dir/$nombreImg");
        } else {
            $nombreImg = $imagen;
        }
        $sql = "UPDATE libros SET Nombre = ?,Genero= ?,Autor = ?, Anio = ?, Imagen = ? WHERE idLibro = ?";
        $result = $conexion->prepare($sql);
        $result->bindParam(1, $nombre, PDO::PARAM_STR);
        $result->bindParam(2, $genero, PDO::PARAM_STR);
        $result->bindParam(3, $autor, PDO::PARAM_INT);
        $result->bindParam(4, $anio, PDO::PARAM_STR);
        $result->bindParam(5, $nombreImg, PDO::PARAM_STR);
        $result->bindParam(6, $idLibro, PDO::PARAM_INT);
        if ($result->execute()) {
            $answer = "0X011";
        } else {
            $answer = "0X010";
        }
        return $answer;
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    } finally {
        $conexion = null;
    }
}

function registerUser($email, $name, $user, $pass){
    try{
    global $conexion;
    $pass=password_hash($pass, PASSWORD_DEFAULT);
    $sql="INSERT INTO usuario (nombre, user, email, clave) VALUES (?,?,?,?)";
    $result = $conexion->prepare($sql);
    $result->bindParam(1, $name, PDO::PARAM_STR);
    $result->bindParam(2, $user, PDO::PARAM_STR);
    $result->bindParam(3, $email, PDO::PARAM_STR);
    $result->bindParam(4, $pass, PDO::PARAM_STR);
    if($result->execute()){
        $rta="0X006";
    }else{
        $rta="0X007";
    }
    return $rta;
}catch(PDOException $e){
    echo "error".$e->getMessage();
}finally{
    $conexion = null;
}
}

function login($user, $pass)
{
    
    global $conexion;
    $sql = "SELECT *FROM usuario WHERE user=?";
    $result = $conexion->prepare($sql);
    $result->bindParam(1,$user,PDO::PARAM_STR);
    if($result->execute()){
        $info = $result->fetch();
        if($info){
            $passC = $info['clave'];
            $userC = $info['user'];
            $tipoC = $info['tipo'];
            if(password_verify($pass,$passC)){
                session_start();
                $_SESSION['user'] = $userC;
                $_SESSION['tipo'] = $tipoC;
                if($tipoC == 1){
                header("location:./admin/?page=panel");
                }
                else{
                header("location:./?page=library"); 
                }
            }else{
                header("location:./?page=login&answer=0X014");
            }
        }else{
            header("location:./?page=login&answer=0X013");
        }
    }else{
        header("location:./?page=login&answer=0X012");
    }
}