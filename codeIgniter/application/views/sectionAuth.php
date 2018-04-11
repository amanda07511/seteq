<!-- Modal identificacion -->
  <div class="login-modal modal fade" id="modalauth" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Ingresa</h2>
                    <div>
                    <a class="btn btn-info btn-block" role="button" aria-expanded="false" aria-controls="collapseExample" href="<?=base_url()?>index.php/cSistemaV">
                      Ingresar como Invitado
                    </a>
                    <br>
                    <br>
                    <a class="btn btn-info btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Ingresar como administrador
                    </a>
                    <br>
                    <br>
                    <div class="collapse" id="collapseExample">
                        <form id="authForm" method="post" enctype="multipart/form-data" data-toggle="validator" action="<?=base_url()?>index.php/clogin/autenticar">
 
                        <div class="form-group">
                          <input type="email" class="form-control"  id="emailLogin" name ="emailLogin" placeholder="Email *" data-error="Por favor introduce una cuenta de correo" required>
                          <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="passwordLogin" name ="passwordLogin"  type="password" placeholder="Contraseña *" required data-validation-required-message="Por favor introduce una cuenta de contraseña">
                          <p class="help-block text-danger"></p>
                        </div> 
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                          <div id="success"></div>
                            <button id="btnlogin"  class="btn btn-primary btn-xl text-uppercase" type="submit">Entrar
                            </button>
                            <br>
                            <br>
                        </div>
                        <br>
                        <div class="alert alert-danger" id="errorUP" style="display: none;">
                          <strong>Error!</strong> Usuario o Contraseña incorrectos.
                        </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="login-modal modal fade" id="modalReg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Registro</h2>
                    <form id="RegisterForm" name="sentMessage" novalidate>
                    <div class="form-group">
                      <input class="form-control" id="nombre" type="text" placeholder="Nombre *" required data-validation-required-message="Por favor introduce tu nombre.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="emailR" type="email" placeholder="Email *" required data-validation-required-message="Por favor introduce una cuenta de correo.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="emailR2" type="email" placeholder="Confirma tu Email *" required data-validation-required-message="Por favor introduce nuevamente tu cuenta de correo.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="password" type="password" placeholder="Contraseña *" required data-validation-required-message="Por favor introduce una contraseña">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="confirmPassword" type="password"  onchange="Validate()" placeholder="Confirma tu Contraseña *" required data-validation-required-message="Por favor introduce nuevamente tu contraseña">
                        <p class="help-block text-danger"></p>
                    </div>  
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                          <button id="btnRegistrar"  href="<?=base_url()?>index.php/cLogin" class="btn btn-primary btn-xl text-uppercase" >Entrar
                      </button>
                    </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

