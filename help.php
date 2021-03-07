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
          <div class="col-md-5">
            <form action="send.php" method="post">
                <div class="form-group">
                    <label for="inputName">Nombre</label>
                     <input type="text" class="form-control" id="inputName" placeholder="Ingrese su nombre" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email" name="email">
                    <small id="emailHelp" class="form-text text-muted">No compartiremos su correo electronico.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
          </div>
          <div class="col-md-5"><img src="img/coding_.svg" alt="" /></div>
          <div class="col-md-5"><img src="img/marketing.svg" alt="" /></div>
          <div class="col-md-5">
             <div class="btn btn-outline-success mb-3">
             <img src="images/phone.png" width="50" height="50" alt="" />
            </div>
            <?php
                if(isset($_GET['answer'])){
                $answer= $_GET['answer'];
                $message = showMessage($answer);
                echo $message;
                }
            ?>
            <h1>Comunicate con nosotros</h1>
            <p>
              ¿En qué podemos ayudarte?
            </p>
          </div>
          <div class="col-md-5"><img src="img/revenue_.svg" alt="" /></div>
        </div>
      </div>
    </section>
