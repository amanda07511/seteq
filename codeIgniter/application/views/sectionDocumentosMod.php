<!-- Modal identificacion -->
  <div class="login-modal modal fade" id="modalDoc" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Nuevo Archivo</h2>
                    <form id="docForm" method="POST" enctype="multipart/form-data">
 
                    <div class="form-group">
                       <div class="row">
                            <div class="col-10">
                              <input type="Text" class="form-control"  id="titleDoc" name="titleDoc" placeholder="Titulo *" data-error="Por favor introduce un titulo" required disabled>
                              <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-2" style="padding-left: 0px !important; padding-right: 0px !important;">
                                <img class="img-mod img-fluid d-block mx-auto" id="img" name="img" src="<?=base_url()?>img/logos/file.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <input  id="userfile" name ="userfile"  type="file">
                    </div>
                    <div class="form-group">
                      <select name="carpeta" class="form-control" required>
                        <option value="Formatos" class="form-control">Formatos</option>
                        <option value="Completos" class="form-control">Completos</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                          <button id="btnAddDoc"  class="btn btn-primary btn-xl text-uppercase" type="submit" >Subir
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
                <a class="btn btn-secondary" href="<?=base_url()?>index.php/cSistemaA"  role="button">Close</a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

<!-- Modal identificacion -->
  <div class="login-modal modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
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
                        Esta seguro de querer eliminar este archivo?
                      </div>
                      <br>
                      <a class="btn btn btn-danger" href="#" id="btnDeleteDoc" role="button">Continuar</a>
                    </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="login-modal modal fade" id="modalEditDoc" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Modificar Archivo</h2>
                    <form id="modForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      
                        <div class="row">
                          <div class="col-10">
                            <input type="Text" class="form-control"  id="titleDoc" name="titleDoc" placeholder="Titulo *" data-error="Por favor introduce un titulo" required disabled>
                          </div>
                          <div class="col-2" style="padding-left: 0px !important; padding-right: 0px !important;">
                           <img class="img-mod img-fluid d-block mx-auto" id="imgDoc" src="<?=base_url()?>img/logos/file.png" alt="">
                          </div>
                        </div>
                 
                    </div>
                    <div class="form-group">
                      <input class="form-control"  id="file" name ="file"  type="file">
                    </div>
                    <div class="form-group">
                      <select name="carpeta" class="form-control" required>
                        <option value="Formatos" class="form-control">Formatos</option>
                        <option value="Nuestros" class="form-control">Completos</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                      <div id="success"></div>
                          <button id="btnModDoc"  class="btn btn-primary btn-xl text-uppercase" type="submit" >Guardar
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




   