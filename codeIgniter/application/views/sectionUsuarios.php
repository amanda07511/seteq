  <div id="page-content-wrapper">
      <div class="container-fluid">
        <br>
        <h1>Documentos</h1>
        <div id="addFile">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUser"><i class="fas fa-user-plus"></i>&nbsp; Agregar Usuario</button>
        </div> 
        <?php if ($total > 0): ?> 
        <table class="table table-hover">
          <thead >
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Tipo</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($result as $results) : ?>
            <tr>
              <td class="col-sm-3"><?=$results->nombre?> <?=$results->apellido1?> <?=$results->apellido2?></td>
              <td class="col-sm-2"><?=$results->email?></td>
              <?php if ($results->tipoUser == 1): ?> 
                <td class="col-sm-1">Administrador</td>
              <?php else: ?>
                <td class="col-sm-1">Editor</td>
              <?php endif; ?>
              <td class="col-sm-1">
                <a type="button" class="a-modificar btn btn-warning" style="color: #fff;" href="<?=$results->idUser?>"><i class="far fa-edit"></i>&nbsp;</a>
              </td>
              <td class="col-sm-1">
                <a type="button" class="a-eliminar btn btn btn-danger" href="<?=$results->idUser?>"><i class="fas fa-trash-alt"></i> &nbsp;</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
  </div>

  </div>

