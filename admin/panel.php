<br><br><br><br><br>
<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['tipo'])==1){
    echo "<a href=../?page=login&signoff=true>Salir del sistema</a>"
?>
<?php
if(isset($_GET['action'])&& $_GET['action'] == 'delete'){
    $idLibro = $_GET['idLibro'];
    $answer = deleteBook($idLibro);
    echo showMessage($answer);
}
if(isset($_GET['action'])&& $_GET['action'] == 'upgrade'){
  $idLibro = $_GET['idLibro'];
  $estado = $_GET['estado'];
  $answer= upgrade($idLibro, $estado);
  echo showMessage($answer);
}
?>
<br>
<h1 style="color:rgb(83, 26, 26);">Gestión de libros</h1>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libro</th>
      <th scope="col">Genero</th>
      <th scope="col">Anio</th>
      <th scope="col">Autor</th>
      <th scope="col">Imagen</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <?php
    include "conexion.php";
    $sql ="SELECT p.idLibro,p.Nombre,p.Genero,p.Anio,p.Estado, p.Imagen, a.Nombre as autor from libros p INNER JOIN autor a ON p.Autor=a.idAutor";
    $conexion->prepare($sql);
    foreach($conexion->query($sql) as $row){
    ?>
  <tbody>
    <tr>
      <th scope="row"><?=$row['idLibro'];?></th>
      <td><?=$row['Nombre'];?></td>
      <td><?=$row['Genero'];?></td>
      <td><?=$row['Anio'];?></td>
      <td><?=$row['autor'];?></td>
      <td><img src="../images/books/<?=$row['Imagen']; ?>" style="width:50px"></td>
      <td>
        <?php
           $estado =$row['Estado'] == 1? 'Desactivar -':'Activar -';
        ?>
        <a href="./?page=panel&action=upgrade&idLibro=<?=$row['idLibro'];?>&estado=<?=$estado?>"><?=$estado?></a>
        <a href="./?page=panel&action=delete&idLibro=<?=$row['idLibro'];?>" onclick = "return confirm('¿Seguro quieres eliminar el libro?')">Eliminar</a>
        <a href="?page=edit&idLibro=<?=$row['idLibro'];?>">- Editar</a>
      </td>
    </tr>
  </tbody>
  <?php
    }
?>
</table>
<?php
}else{
    header("location:../?page=login&answer=0X015");
}
?>