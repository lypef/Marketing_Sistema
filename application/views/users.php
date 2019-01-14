<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NOMBRE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">USUARIO</th>
      <th scope="col">CONTRASEÑA</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($users as $item ){
            $estatus = 'Activo';
            $estatus_edit = 'checked';
            $estatus_edit_value = 1;
            $estatus_premium = 'ACTIVO';

            $estatus_edit_premium = 'checked';
            $estatus_edit_value_premium = 1;

            if (!$item->active)
            {
                $estatus = 'Suspendido';
                $estatus_edit = '';
                $estatus_edit_value = 0;
            }

            if (!$item->premium5)
            {
                $estatus_premium = 'NO Activo';
                $estatus_edit_premium = '';
                $estatus_edit_value_premium = 0;
            }

            echo '
            <tr>
                <th scope="row">'.$item->name.'</th>
                <td>'.$item->mail.'</td>
                <td><center><h3><span class="label label-success text-lowercase">'.$item->username.'</span></h3></center></td>
                <td>'.$item->password.'</td>
                <td align="center">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar'.$item->id.'" ><span class="fa fa-pencil" /></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$item->id.'" ><span class="fa fa-trash-o" /></button>
                </td>
            </tr>
                
                <!-- Eliminar cliente -->
                <div class="modal fade" id="delete'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> Eliminar <strong>A: '.$item->name.'</strong> ?</h5></strong>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar el usuario: <strong>'.$item->username.'</strong> y toda su informacion relacionada, esto puede afectar en un porcentaje alto al sistema. ?<BR>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/users_delete" autocomplete="off">
                    <div class="modal-footer">
                            <input type="hidden" id="id" name="id" value="'.$item->id.'">
                            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                            <button type="button" class="btn btn-success" data-dismiss="modal">NO, Cancelar</button>
                            <button type="submit" class="btn btn-danger">SI, Eliminar</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>


                <!-- Editar cliente -->
                <div class="modal fade" id="editar'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                    
                    <div class="site-content" id="content">
                    <h2 class="idol-title">Actualizar datos de: '.$item->empresa.'</h2>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/users_update" autocomplete="off">
                            <p>
                                <span class="">
                                <input id="name" class="" type="text" value="'.$item->name.'" name="name" placeholder="Nombre: " autocomplete="off" required>
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="mail" class="" type="email" value="'.$item->mail.'" name="mail" placeholder="Email: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="username" class="" type="text" value="'.$item->username.'" name="username" placeholder="Nombre de usuario: " autocomplete="off">
                                </span>
                            </p>
                            <h2 class="idol-title">Ingrese y confirme contraseña para cambiarla</h2>
                            <p>
                                <span class="">
                                <input id="password" class="" type="password" value="" name="password" placeholder="Contraseña: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="password_confirm" class="" type="password" value="" name="password_confirm" placeholder="Confirme Contraseña: " autocomplete="off">
                                </span>
                            </p>
                            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                            <input type="hidden" id="id" name="id" value="'.$item->id.'">

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning" >Actualizar</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            ';
        } 
    ?>
  </tbody>
</table>
<br><br><br>
