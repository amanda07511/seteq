<!-- Modal identificacion -->
  <div class="login-modal modal fade" id="modalUser" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Nuevo Usuario</h2>
                    <form id="userForm" method="POST" enctype="multipart/form-data">
 
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="nom" name="nom" placeholder="Nombre(s) *"  required>
                    </div>
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="ap1" name="ap1" placeholder="Apellido Paterno *"  required>
                    </div>
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="ap2" name="ap2" placeholder="Apellido Materno *"  required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control"  id="email" name="email" placeholder="Email *"  required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  id="password" name="password" placeholder="Contraseña *"  required>
                    </div>
                    <div class="form-group">
                      <select name="tipoUser" class="form-control" required>
                        <option value="1" class="form-control">Administrador</option>
                        <option value="2" class="form-control">Editor</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                          <button id="btnAddUser"  class="btn btn-primary btn-xl text-uppercase" type="submit" >Agregar
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

  <div class="login-modal modal fade" id="modalWait" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                    <div class="modal-body panel-body">
                    </div>
                </div>
              </div>
              <div class="col-lg-8 mx-auto" id="showClose" style="display: none;">
                <a class="btn btn-secondary" href="<?=base_url()?>index.php/cUsers"  role="button">Close</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

<!-- Modal identificacion -->
  <div class="login-modal modal fade" id="modalDeleteU" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <div>
                      <div>
                        <div class="text-danger"><i class="fas fa-exclamation-triangle fa-5x"></i></div>
                        <br>
                        Esta seguro de querer eliminar este usuario?
                      </div>
                      <br>
                      <a class="btn btn btn-danger" href="#" id="btnDeleteU" role="button">Continuar</a>
                    </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="login-modal modal fade" id="modalEditU" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Modificar Usuario</h2>
                    <form id="modFormU" method="POST" enctype="multipart/form-data">
 
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="nomM" name="nom" placeholder="Nombre(s) *"  required>
                    </div>
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="ap1M" name="ap1" placeholder="Apellido Paterno *"  required>
                    </div>
                    <div class="form-group">
                        <input type="Text" class="form-control"  id="ap2M" name="ap2" placeholder="Apellido Materno *"  required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control"  id="emailM" name="email" placeholder="Email *"  required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  id="passwordM" name="password" placeholder="Contraseña">
                    </div>
                    <div class="divU">
                      <select name="tipoUser" class="form-control" required>
                        <option value=1 class="form-control">Administrador</option>
                        <option value=2 class="form-control">Editor</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                          <button id="btnmodU"  class="btn btn-primary btn-xl text-uppercase" type="submit" >Modificar
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
      




   