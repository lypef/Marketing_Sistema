<form class="search-form">
    <label>
        <div class="row">
            <div class="col-sm-11">
                <input class="search-field" type="search" placeholder="Ingrese responsable o empresa para buscar" value="<?php echo $_GET['search'] ?>" name="search" autocomplete="off">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-default" style="height: 50px;" width="100%"><span class="fa fa-search" /></button>
            </div>
        </div>
    </label>
</form>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">NO. CLIENTE</th>
      <th scope="col">EMPRESA</th>
      <th scope="col">ESTATUS</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">RESPOSABLE</th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($data as $item ){
            $estatus = 'Activo';
            $estatus_edit = 'checked';
            $estatus_edit_value = 1;

            if (!$item->active)
            {
                $estatus = 'Suspendido';
                $estatus_edit = '';
                $estatus_edit_value = 0;
            }

            echo '
            <tr>
                <th scope="row">'.$item->id.'</th>
                <td>'.$item->empresa.'</td>
                <td>'.$estatus.'</td>
                <td>'.$item->name.'</td>
                <td>'.$item->responsable.'</td>
                <td align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ver'.$item->id.'" ><span class="fa fa-eye" /></button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editar'.$item->id.'" ><span class="fa fa-pencil" /></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$item->id.'" ><span class="fa fa-trash-o" /></button>
                    <a href="/aa" target="_blank" class="btn btn-warning"><span class="fa fa-cogs" /></a>
                </td>
            </tr>
                
                <!-- Eliminar cliente -->
                <div class="modal fade" id="delete'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> '.$item->empresa.'</h5></strong>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar el cliente: <strong>'.$item->empresa.'</strong> y toda su informacion relacionada ?<BR>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/client_delete" autocomplete="off">
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
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/client_update" autocomplete="off">
                            <p>
                                <span class="">
                                '.GetCategoriesSelectID($item->id_cat).'
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="empresa" class="" type="text" value="'.$item->empresa.'" name="empresa" placeholder="Empresa: " autocomplete="off" required>
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="direccion" class="" type="text" value="'.$item->direccion.'" name="direccion" placeholder="Direccion: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="email" class="" type="email" value="'.$item->mail.'" name="email" placeholder="Email: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="telefono" class="" type="number" value="'.$item->telefono.'" name="telefono" placeholder="Telefono: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="responsable" class="" type="text" value="'.$item->responsable.'" name="responsable" placeholder="Responsable: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                    <input type="checkbox" name="estatus" id="estatus" value="'.$estatus_edit_value.'" '.$estatus_edit.'> Seleccione estatus de el cliente.<br>
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



            <!-- Visualizar cliente -->
            <div class="modal fade" id="ver'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-body">
                <hr>
                <strong>EMPRESA:</strong><BR>'.$item->empresa.'<BR><BR>
                <strong>RESPONSABLE:</strong> <BR>'.$item->responsable.'<BR><BR>
                <strong>NO. DE CLIENTE: </strong># '.$item->id.', <strong>ESTATUS:</strong> '.strtoupper($estatus).'<BR><BR>
                <strong>CATEGORIA A LA QUE PERTENECE: </strong><BR>'.$item->name.'<BR><BR>
                <strong>DIRECCION: </strong><BR>'.$item->direccion.'<BR><BR>
                <strong>EMAIL: </strong><BR>'.$item->mail.'<BR><BR>
                <strong>TELEFONO: </strong><BR>'.$item->telefono.'<BR><BR>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
                </div>
            </div>
            </div>
            ';
        } 
    ?>
  </tbody>
</table>
<br>

<style>
.center {
text-align: center;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 18px;
}

.pagination a.active {
  background-color: #0c92cc;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

<div class="center">
    <div class="pagination">
        <?php 
            if ($pag > 1)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=" . ($pag-1);
                echo '<a href="'.$link.'">&laquo;</a>';
            }else
            {
                $link = "#";
                echo '<a href="'.$link.'">&laquo;</a>';
            }
        ?>
        <?php

        for ($i = 1; $i <= $pags; $i++) {
            if ($pag == $i)
            {
                echo '<a class="active" href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=" . ($pag+1);
                echo '<a href="'.$link.'">&raquo;</a>';
            }else
            {
                $link = "#";
                echo '<a href="'.$link.'">&raquo;</a>';
            }
        ?>
    </div>
</div>

<br><br>
