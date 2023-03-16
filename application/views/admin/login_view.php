   <div class="container">
        <div class="row">           
          <div class="col-sm-12">
            <p>&nbsp;</p>
          </div>
          <div class="col-sm-12 hidden-xs">
            <p>&nbsp;</p>
          </div>
          <div class="col-sm-12 hidden-xs">
            <p>&nbsp;</p>
          </div>
        </div>
        <div class="row">          
            <div class="col-md-8 col-md-offset-2 ">
                <div class="panel panel-primary">
                <div class="panel-heading">
                        <h2 class="panel-title text-center">Acceso de Usuario</h2>
                </div>
                <div class="panel-body">
                  <div>
                    <p>
                                        Introduce tu código de usuario y tu contraseña para acceder
                                        al Portal de Administración.</p>
                  </div>
                  
                <?php echo form_open('login/check_login'); ?> 

                    <div class="form-group">
                        <label for="username">Nombre Usuario:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                          </div>                                      
                          <input class="form-control" id="username" type="text" placeholder="Nombre de Usuario" name="username" value="<?php echo set_value('username'); ?>">                                      
                        </div>
                    </div>
                    <div class="form-group">
                         <label for="password">Contrase&ntilde;a:</label>
                         <div class="input-group">
                           <div class="input-group-addon">
                              <span class="glyphicon  glyphicon-lock"></span>
                           </div>          
                           <input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
                         </div>
                    </div>                               
                      <!-- Change this to a button or input when using this as a form -->
                            
                    <div class="form-group">
                      &nbsp;    
                      <div class="row"> 
                        <?php echo validation_errors('<div class="alert alert-danger"> <a class="close" data-dismiss="alert"> <span class="glyphicon glyphicon-remove-circle"></span></a>', '</div> '); ?>
                      </div> 

                      <?php                                   
                        if (!empty($message)) {                                  
                        $error  = $message;
                       ?>
                          <div class="alert alert-danger alert-dismissable">                              
                              <a class="close" data-dismiss="alert"> 
                                <span class="glyphicon glyphicon-remove-circle"></span>
                              </a>
                              <b>Error! </b><?php echo $error; ?>
                          </div>
                         
                      <?php } ?>
                      </div>
                    <div class="panel -footer  text-center">                             
                          <button class="btn btn-primary" type="submit" id="b_login">Ingresar al Sistema</button>                                                         
                    </div>
                  <?php echo form_close(); ?>

                                   
                                        
                                    
                                    <p>&nbsp;</p>
                                    <p>
                                        Si  has olvidado tu contraseña <a href="/Home/Faqs"><strong>pulsa
                                            aquí</strong></a>.</p>

                  </div>
        </div>
        </div>
        </div>
    </div>                

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- SIN NN<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>-->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SIN NN<script src="<?php echo base_url();?>assets/bootstrap/win/docs.min.js"></script>-->
    <script src="<?php echo base_url();?>assets/bootstrap/win/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/bootstrap/win/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
