<br><br><br><br><br>
<?php
session_start();
if(isset($_SESSION['user'])&&($_SESSION['tipo'])==1){
    echo "<a href=../?page=login&signoff=true>Salir del sistema</a>"
?>
<section class="services gradient">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row align-items-center justify-content-center">
        <?php
          if(isset($_POST['send'])){
          $answer = saveBook($_POST);
          echo showMessage($answer);
          }
      ?>
          <div class="col-md-5">
          <h1>Registrar libro</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">Nombre</label>
                     <input type="text" class="form-control" id="inputName" placeholder="Ingrese el nombre del libro" name="name">
                </div>
                <br>
                <div class="form-group">
                    <label for="inputName">Genero</label>
                     <input type="text" class="form-control" id="inputName" placeholder="Ingrese el género del libro" name="genre">
                </div>
                <br>
                <div class="form-group">
                    <label for="inputName">Anio</label>
                     <input type="text" class="form-control" id="inputName" placeholder="Ingrese el año del libro" name="year">
                </div>
                <div class="form-group">
                    <label for="inputName">Autor</label>
                    <select class="form-select" aria-label="Default select example" name="author">
                    <?php
                        $info = authorList();
                        foreach ($info as $value) {
                    ?>
                        <option value=<?= $value['idAutor'] ?>><?= $value['Nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <br>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="inputName">Imagen</label>
                    <input type="file" name ="imagen">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-dark" name="send">Enviar</button>
            </form>
          </div>
          <div class="col-md-5"><img src="img/coding_.svg" alt="" /></div>
          <div class="col-md-5"><img src="img/marketing.svg" alt="" /></div>
          <div class="col-md-5">
          </div>
          <div class="col-md-5"><img src="img/revenue_.svg" alt="" /></div>
        </div>
      </div>
    </section>
<?php
}else{
    header("location:../?page=login&answer=0X015");
}
?>