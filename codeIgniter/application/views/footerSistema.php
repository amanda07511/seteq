
    
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
        var idDoc;
        var idUser;
        
        $('#docForm').submit(function(e){

            //evitar que el link intente ejecutar el href
            e.preventDefault();

            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Cargando archivo, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $('input[name=titleDoc]').prop("disabled", false);

            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cDocumentos/subirDocumento",
                method:"POST",  
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                dataType : 'json',
                success : function (data, status){
                    if(data.status != 'error'){
                        var textoOk;
                        textoOk='<i class="fa fa-check fa-5x"></i><br />Carga exitosa!';
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
            $("#modalDelete").modal("show");
            idDoc =$(this).attr("href");
        });//termina click de eliminarr

        $(".a-eliminar-u").click(function(e){
             e.preventDefault();
            $("#modalDeleteU").modal("show");
            idUser =$(this).attr("href");
        });//termina click de eliminarr

        $(".a-modificar").click(function(e){
            e.preventDefault();
            idDoc =$(this).attr("href");
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cDocumentos/getDoc",
                method:"POST",
                dataType : "json",
                data : {
                    idDoc : idDoc
                },
                success : function (data){
                    $('input[name=titleDoc]').val(data.data.doc.titulo);
                    $('select[name=carpeta] [value="data.data.doc.carpeta"]').attr('selected',true);

                    if(data.data.ext == "docx" || data.data.ext == "doc"){
                        $(".img-mod").attr("src","<?=base_url()?>img/logos/word.ico"); 
                    }
                    else if(data.data.ext == "pdf"){
                        $(".img-mod").attr("src","<?=base_url()?>img/logos/pdf.png");
                    }
                    else if(data.data.ext == "xls"||data.data.ext == "xlsx"){
                        $(".img-mod").attr("src","<?=base_url()?>img/logos/excel.png");
                    }
                    else{
                        $(".img-mod").attr("src","<?=base_url()?>img/logos/file.png");
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

            $("#modalEditDoc").modal("show");
            $("#btnModDoc").attr('disabled',true);

        });//a-modificar

         $(".a-mod").click(function(e){
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
                    $('input[name=titleDoc]').val(data.data.doc.titulo);
                    $('select[name=carpeta] [value="data.data.doc.carpeta"]').attr('selected',true);
                    
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

         $("#modForm").submit(function(e){
            //evitar que el link intente ejecutar el href
            e.preventDefault();

            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Cargando archivo, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $('input[name=titleDoc]').prop("disabled", false);
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cDocumentos/modificarDocumento/"+idDoc,
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

        $("#modFormU").submit(function(e){
            //evitar que el link intente ejecutar el href
            e.preventDefault();

            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Cargando archivo, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $('input[name=titleDoc]').prop("disabled", false);
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cDocumentos/modificarDocumento/"+idDoc,
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

        $("#btnDeleteDoc").click(function (e){
            var textoOriginal;
            textoOriginal = $(".panel-body").html();
            $(".panel-body").html('<p class="text-center">Eliminando archivo, por favor espere... <br /><i class="fas fa-circle-notch fa-pulse"></i></p>');
            $(".modal").modal('hide');
            $("#modalWait").modal({backdrop: 'static', keyboard: false});
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/cDocumentos/eliminarDocumento",
                method:"POST",
                dataType : "json",
                data : {
                    idDoc : idDoc
                },
                success : function (data, status){
                    if(data.status != 'error'){
                        var textoOk;
                        textoOk='<i class="fa fa-check fa-5x"></i><br />Carga exitosa!';
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

        $("input:file").change(function (){
            $('input[name=titleDoc]').prop("disabled", false);
            if($(this).val() !== ''){
               $("#btnModDoc").prop('disabled', false); 
            }
            var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
            $('input[name=titleDoc]').val(fileName);
            
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if(fileNameExt == "docx" || fileNameExt == "doc"){
                $(".img-mod").attr("src","<?=base_url()?>img/logos/word.ico"); 
            }
            else if(fileNameExt == "pdf"){
                $(".img-mod").attr("src","<?=base_url()?>img/logos/pdf.png");
            }
            else if(fileNameExt == "xls"||fileNameExt == "xlsx"){
                $(".img-mod").attr("src","<?=base_url()?>img/logos/excel.png");
            }
            else{
                $(".img-mod").attr("src","<?=base_url()?>img/logos/file.png");
            }
            $('input[name=titleDoc]').prop("disabled", true);

        });


    });//closeJQuery

</script>

</body>
</html>