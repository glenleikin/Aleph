<?php
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$message = trim($_POST['message']);
$textPattern = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
if (empty($name)) {
    header("location:./?page=help&answer=0X001");
} elseif (strlen($name) < 3) {
    header("location:./?page=help&answer=0X001");
} elseif (is_numeric($name)) {
    header("location:./?page=help&answer=0X001");
} elseif (is_numeric(substr($name, 0, 1))) {
    header("location:./?page=help&answer=0X001");
} elseif (is_numeric(substr($name, 0, 1)) || is_numeric(substr($name, -1, 1))) {
    header("location:./?page=help&answer=0X001");
} elseif (!preg_match($textPattern, $name)) {
    header("location:./?page=help&answer=0X001");
} elseif (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
    header("location:./?page=help&answer=0X002");
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    header("location:./?page=help&answer=0X002");
} elseif (strlen($message) > 400) {
    header("location:./?page=help&answer=0X003");
} else {
   $for = "contact@aleph.com";
   $about = "Centro de ayuda";
   $body = "<h1 style = color:red> Contacto web Aleph </h1>";
   $body.="<img src = images/logo.png><br>";
   $body.="Nombre = ".$name;
   $body.="<br>Email: ".$email;
   $body.="<br>Mensaje: ".$message;
   $body.="<br><br><br> ¡Adios!";
   $head = "From:" . $email . "\r\n";
   $head.= "MIME-Version: 1.0\r\n";
   $head.= "Content-Type: text/html; charset=UTF-8\r\n";
  if (!mail($for,$about,$body, $head)){
    header("location:./?page=help&answer=0X005");
  }else{
    header("location:./?page=help&answer=0X004");
  }
}
