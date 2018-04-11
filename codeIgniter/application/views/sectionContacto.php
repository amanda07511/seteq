    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Cuentanos tu proyecto!</h2>
            <h3 class="section-subheading text-muted">Trabajaremos para hacerlo realidad.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form action="<?=base_url()?>index.php/welcome/sendMail" enctype="multipart/form-data" method="post" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre *" required data-validation-required-message="Por favor introduce tu nombre.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Email *" required data-validation-required-message="Por favor introduce una cuenta de correo.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="telefono" type="tel" placeholder="Telefono de contacto *" required data-validation-required-message="Por favor introduce un Telefono para contactarte.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="empresa" type="text" placeholder="Empresa *" required data-validation-required-message="Por favor introduce un el nombre de tu empresa.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="puesto" type="text" placeholder="Puesto*" required data-validation-required-message="Por favor introduce tu puesto en tu empresa.">
                    <p class="help-block text-danger"></p>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-muted">Tipo de proyecto</p>
                    <select class="form-control" name="tipoP" data-live-search="true">
                      <option data-tokens="Software">Proyecto software</option>
                      <option data-tokens="Web">Proyecto Web</option>
                      <option data-tokens="E-commerce">Proyecto E-commerce</option>
                      <option data-tokens="Movil">Proyecto Móvil</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <p class="text-muted">¿Cómo quiere que lo contactemos?</p>
                    <select class="form-control" name="contacto" data-live-search="true">
                      <option data-tokens="Correo Electronico">Correo Electrónico</option>
                      <option data-tokens="Telefono">Telefono</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="mensaje" placeholder="Cuentanos un poco más de tu proyecto *" required data-validation-required-message="Por favor ponga más información acerca de su proyecto."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar
                   <i class="fab fa-telegram-plane"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>