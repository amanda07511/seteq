<!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; SETEQ</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#" id="foo">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" id="foo">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" id="foo">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="<?=base_url()?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url()?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=base_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>vendor/jquery-password/validator.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?=base_url()?>vendor/js/jqBootstrapValidation.js"></script>
    <script src="<?=base_url()?>vendor/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=base_url()?>vendor/js/agency.min.js"></script>
    
    <?php 
    /*Si existe la variable _GET llamada 
    'error', entonces mostramos una alerta 
    para indicar que el usuario no existe*/
    if($this->input->get('login')) : ?>
      <script type="text/javascript">
        <?php if($this->input->get('login') == 1) : ?>
          $("#modalauth").modal("show");
        <?php endif; ?>
      </script>
    <?php endif; ?>

    <?php 
    /*Si existe la variable _GET llamada 
    'error', entonces mostramos una alerta 
    para indicar que el usuario no existe*/
    if($this->input->get('error')) :  ?>
      <script type="text/javascript">
        <?php if($this->input->get('error') == 1) : ?>
          $("#modalauth").modal("show");
          $("#errorUP").show();
        <?php endif; ?>
      </script>
    <?php endif; ?>


  
</body>
</html>