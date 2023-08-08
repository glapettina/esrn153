<div id="back"></div>

<div class="login-box">

  <div class="login-logo">
   

   <!-- <h2>ESRN Nº 153</h2> -->

   <img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:60px 100px 0px 100px">
 
  </div>

  
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group">
           <label>Período</label>
           <select class="form-control" id="periodo" name="periodo" required>
              <option value="">-- Seleccione --</option>              
              <option value="01/2022">01/2022</option>
              <option value="02/2022">02/2022</option>
              <option value="01/2023">01/2023</option>
           </select>
      </div>     

      <div class="row">
        
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

        </div>
        
      </div>

      <?php

          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();

      ?>

    </form>

 
  </div>
  
</div>
