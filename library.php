<br><br><br><br><br>
<?php
session_start();
if(isset($_SESSION['user'])){
    echo "<a href=./?page=login&signoff=true>Salir del sistema</a>"
?>
    <section class="gallery">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1>Nuestra bibloteca</h1>
            <p>
            <i>
            De los diversos instrumentos inventados por el hombre, el más asombroso es el libro; todos los demás son extensiones de su cuerpo… Sólo el libro es una extensión de la imaginación y la memoria
            </i>
            </p>
          </div>
        </div>
        <div class="row my-3 g-3">
        <?php
		  include 'admin/conexion.php';
          $sql = "SELECT *FROM libros where Estado=1";
		$conexion->prepare($sql);
		foreach($conexion->query($sql) as $row)
		{
      ?>
          <div class="col-md-4">
            <img class="img-fluid" src="images/books/<?=$row['Imagen'];?>"  width = "150px" height= "220px" />
            <h6><?=$row['Nombre'];?></h6>
		        <h6><?=$row['Genero'];?></h6>
		        <h6><?=$row['Anio'];?></h6>
                <button type="button" class="btn btn-outline-secondary">
                Añadir a mi bibloteca
                </button>
          </div>
        <?php
		    }
            ?>
        </div>
        <div class="row mt-5 justify-content-end">
          <div class="col-md-2">
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"
        ></path>
      </svg>
    </section>
<?php
}else{
    header("location:./?page=login&answer=0X015");
}
?>
    
  