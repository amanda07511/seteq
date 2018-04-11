
    
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

<!--JQuery debe programarse dentro de una etiqueta scrip-->
<script type="text/javascript">

    jQuery(document).ready(function(){
        var idUser;
        
        $('#userForm').submit(function(e){

            //evitar que el link intente ejecutar el href
            e.preventDefault();

            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Creando usuario, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $('input[name=titleDoc]').prop("disabled", false);

            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cUsers/crearUsuario",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType : 'text',
                success : function (data, status){
                    console.log(data);
                    if(data.status != 'error'){
                        var textoOk;
                        textoOk='<i class="fa fa-check fa-5x"></i><br />Creación exitosa!';
                        //agrego el texto a la ventana
                        $(".panel-body").attr('style','color: #4F8A10;');
                        $(".panel-body").html(textoOk);
                        $("#showClose").show();
                    }
                    else{
                        var textoOk;
                        textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! '+data.msg;
                        $(".panel-body").html(textoOk);
                        $(".panel-body").attr('style','color: #A93226;');
                        $("#showClose").show(); 
                    }

                },
                //si el servidor no responde, o responde con un error
                error : function(jqXHR, textStatus, errorThrown ){
                    var textoOk;
                    textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! ' + jqXHR.status + textStatus + errorThrown;
                    $(".panel-body").html(textoOk);
                    $(".panel-body").attr('style','color: #A93226;');
                    $("#showClose").show();
                }

            });//termina ajax

        });

        $('#btnclose').click(function(){
            return false;
        });

        $(".a-eliminar").click(function(e){
             e.preventDefault();
            $("#modalDeleteU").modal("show");
            idUser =$(this).attr("href");
        });//termina click de eliminarr

         $(".a-modificar").click(function(e){
            console.log("a-modificar-u");
            e.preventDefault();
            idUser =$(this).attr("href");
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cUsers/getUser",
                method:"POST",
                dataType : "json",
                data : {
                    idUser : idUser
                },
                success : function (data){
                    console.log(data);
                    $('input[name=nom]').val(data.data.user.nombre);
                    $('input[name=ap1]').val(data.data.user.apellido1);
                    $('input[name=ap2]').val(data.data.user.apellido2);
                    $('input[name=email]').val(data.data.user.email);
                    var tipo = data.data.user.tipoUser;
                    $("select[name=tipoUser] option[value="+data.data.user.tipoUser+"]").attr('selected','selected');
                },
                //si el servidor no responde, o responde con un error
                error : function(jqXHR, textStatus, errorThrown ){
                    var textoOk;
                    textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! ' + jqXHR.status + textStatus + errorThrown;
                    $(".panel-body").html(textoOk);
                    $(".panel-body").attr('style','color: #A93226;');
                    $("#showClose").show();
                }
            });//termina ajax

            $("#modalEditU").modal("show");

        });//a-modificar

         $("#modFormU").submit(function(e){
            //evitar que el link intente ejecutar el href
            e.preventDefault();

            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Cargando usuario, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});

            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cUsers/modificarUser/"+idUser,
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType : 'json',
                success : function (data, status){
                    if(data.status != 'error'){
                        var textoOk;
                        textoOk='<i class="fa fa-check fa-5x"></i><br />Modificación exitosa!';
                        //agrego el texto a la ventana
                        $(".panel-body").attr('style','color: #4F8A10;');
                        $(".panel-body").html(textoOk);
                        $("#showClose").show();
                    }
                    else{
                        var textoOk;
                        textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! '+data.msg;
                        $(".panel-body").html(textoOk);
                        $(".panel-body").attr('style','color: #A93226;');
                        $("#showClose").show(); 
                    }

                },
                //si el servidor no responde, o responde con un error
                error : function(jqXHR, textStatus, errorThrown ){
                    var textoOk;
                    textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! ' + jqXHR.status + textStatus + errorThrown;
                    $(".panel-body").html(textoOk);
                    $(".panel-body").attr('style','color: #A93226;');
                    $("#showClose").show();
                }
            });//termina ajax
        });


        $("#btnDeleteU").click(function (e){
            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Eliminando usuario, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cUsers/eliminarUser",
                method:"POST",
                dataType : "json",
                data : {
                    idUser : idUser
                },
                success : function (data, status){
                    if(data.status != 'error'){
                        var textoOk;
                        textoOk='<i class="fa fa-check fa-5x"></i><br />Eliminación exitosa!';
                        //agrego el texto a la ventana
                        $(".panel-body").attr('style','color: #4F8A10;');
                        $(".panel-body").html(textoOk);
                        $("#showClose").show();
                    }
                    else{
                        var textoOk;
                        textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! '+data.msg;
                        $(".panel-body").html(textoOk);
                        $(".panel-body").attr('style','color: #A93226;');
                        $("#showClose").show(); 
                    }

                },
                //si el servidor no responde, o responde con un error
                error : function(jqXHR, textStatus, errorThrown ){
                    var textoOk;
                    textoOk='<i class="fas fa-times fa-5x" ></i><br />Ops Ocurrio un error! ' + jqXHR.status + textStatus + errorThrown;
                    $(".panel-body").html(textoOk);
                    $(".panel-body").attr('style','color: #A93226;');
                    $("#showClose").show();
                    
                }
            });//termina ajax

        });//Termina Delete


    });//closeJQuery

</script>

</body>
</html>