	<!-- About -->
   <div id="page-content-wrapper">
      <div class="container-fluid">
        <br>
        <h1>Formatos</h1>
        <?php if ($this->session->userdata('tipo') != null): ?>
          <div id="addFile">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDoc"><i class="fas fa-cloud-upload-alt"></i>&nbsp; Agregar documento</button>
          </div>
        <?php endif; ?>
        <?php if ($total > 0): ?> 
          <table class="table table-hover">
            <thead >
              <tr>
                <th scope="col" class="col-sm-3">Nombre</th>
                <th scope="col">Modificado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($result as $results) : ?>
                <tr>
                  <tr id="tr-<?=$results->idDoc?>">
                    <td class="col-sm-3"><?=$results->titulo?></td>
                    <td class="col-sm-2"><?= date("d-m-Y", strtotime($results->modified))?></td>
                    <td class="col-sm-1">
                      <a href="<?=base_url()?>index.php/cDocumentos/download/<?=$results->file?>" class="btn btn-info"><i class="fas fa-download"></i>&nbsp;</a>
                    </td>
                    <?php if ($this->session->userdata('tipo') != null): ?>
                    <td class="col-sm-1">
                      <button type="button" class="a-modificar btn btn-warning" href="<?=$results->idDoc?>" style="color: #fff;"><i class="far fa-edit"></i>&nbsp;</button>
                    </td>
                    <td class="col-sm-1">
                      <a class="a-eliminar btn btn-danger" href="<?=$results->idDoc?>"><i class="fas fa-trash-alt"></i> &nbsp;</a>
                    </td>
                  <?php endif; ?>
                  </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <br>
          <br>
          <br>
          <div class="alert alert-info">
            <strong>Info!</strong> Por el momento no hay ningun archivo almacenado aqui.
          </div>
        <?php endif; ?>
    </div>
  </div>

</div>