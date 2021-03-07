     <header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
              <br>
              <br>
              <?php
          if (isset($_GET['alert'])) {
          ?>
            <script>
              alert('Sesión cerrada correctamente ¡Adiós!');
            </script>
          <?php
          }
          ?>
            <h2>Aleph</h2>
            <p>
                Uno no es lo que es por lo que escribe, sino por lo que ha leído.
            </p>
            <button type="button" class="btn btn-outline-light btn-lg"  onclick="window.location.href='./?page=login'">
              Ingresar
            </button>
          </div>
          <div class="col-md-5">
            <img
              src="images/readmanicon.png"
              alt=""
              width="460" height="300"
            />
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </header>
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
          <form action="" method="get">
              <input type="text" name="info">
              <input type="submit" value="Buscar" name="search">
	        </form>
          </div>
        </div>
        <div class="row my-3 g-3">
        <?php
		  include 'admin/conexion.php';
      if (isset($_GET['search'])) {
        $info = $_GET['info'];
        $sql = "SELECT *FROM libros where Estado=1 and Nombre like '%$info%'";
      } else {
        $p = (isset($_GET['p'])) ? $_GET['p'] : 0;
        $cp = 2;
        $offset = $p > 0 ? $p * $cp : NULL;
        if ($offset > 0) {
          $sql = "SELECT *FROM libros where Estado=1 limit " . $cp . " offset " . $offset;
        } else {
          $sql = "SELECT *FROM libros where Estado=1 limit " . $cp;
        }
		  }
		$conexion->prepare($sql);
		foreach($conexion->query($sql) as $row)
		{
      ?>
          <div class="col-md-4">
            <img class="img-fluid" src="images/books/<?=$row['Imagen'];?>"  width = "150px" height= "220px" />
            <h6><?=$row['Nombre'];?></h6>
		        <h6><?=$row['Genero'];?></h6>
		        <h6><?=$row['Anio'];?></h6>
          </div>
        <?php
		    }
	      ?>
          
        </div>
        <?php
			$sql = "SELECT count(*) from libros";
			$result = $conexion->prepare($sql);
			$result->execute();
			$total = $result->fetch(PDO::FETCH_COLUMN);
      $p = (isset($_GET['p'])) ? $_GET['p'] : 0;
      $cp = 2;
			$tp = $total / $cp;
			if ($p > 0) {
				echo "<a href=./?page=homepage&p=" . ($p - 1) . "> Anterior</a> ";
			}
			for ($i = 0; $i < $tp; $i++) {
				echo "<a href=./?page=homepage&p=" . $i . ">" . ($i + 1) . "</a> ";
			}
			if($p < $tp -1){
				echo " <a href=./?page=homepage&p=" . ($p + 1) . "> Siguiente</a> ";
			}
			?>
        <div class="row mt-5 justify-content-end">
          <div class="col-md-2">
            <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='./?page=library'">
              Ver todos los libros
            </button>
          </div>
        </div>
      </div>
      <br><br><br><br><br>