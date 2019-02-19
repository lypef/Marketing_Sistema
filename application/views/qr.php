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
      <th scope="col"><center>NO.</center></th>
      <th scope="col">EMPRESA</th>
      <th scope="col">PROMOCION</th>
      <th scope="col"><center>DIRECCION url</center></th>
      <th scope="col">OPCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($data as $item ){
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
                <th scope="row"><center>'.$item->id.'</center></th>
                <td>'.$item->empresa.'</td>
                <td>'.$item->name.'</td>
                <td><center><a target="_BLANK" href="'.$item->url.'"><button type="button" class="btn btn-primary" ><span class="fa fa-arrow-right" /></button></a></center></td>
                <td align="center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ver'.$item->id.'" ><span class="fa fa-eye" /></button>
                    <a href="'.$item->qr_img.'" download="qr_'.$item->name.'.png" class="btn btn-warning"><span class="fa fa-cloud-download" /></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editar'.$item->id.'" ><span class="fa fa-pencil" /></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete'.$item->id.'" ><span class="fa fa-trash-o" /></button>
                </td>
            </tr>
                
                <!-- Eliminar cliente -->
                <div class="modal fade" id="delete'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> '.$item->name.'</h5></strong>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar la promocion: <strong>'.$item->name.'</strong> de '.$item->empresa.' ?<BR>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/qr_delete" autocomplete="off">
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
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/qr_update" autocomplete="off">
                            <p>
                                <span class="">
                                '.GetPromotionsSelectID($item->id_empresa).'
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input value="'.$item->name.'" id="name" class="" type="text" value="" name="name" placeholder="Nombre promocion: ">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input value="'.$item->descripcion.'" id="descripcion" class="" type="text" value="" name="descripcion" placeholder="Descripcion promocion: ">
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-body">

                <div class="row">
  
                    <div class="col-sm-6">
                        <center><img src="'.$item->qr_img.'" height="400" width="400"></center>   
                    </div>

                    <div class="col-sm-6">
                        <br>
                        <strong>No. de promocion: </strong>'.$item->id.'<BR><BR>   
                        <strong>Empresa: </strong>'.$item->empresa.'<BR><BR>   
                        <strong>Nombre promocion: </strong>'.$item->name.'<BR><BR>   
                        <strong>Url promocion: </strong>'.$item->url.'</a><BR><BR>   
                        <strong>Descripcion:<br></strong>'.$item->descripcion.'</a><BR><BR>   
                    </div>
                    
                </div>
                
                
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
                $link = UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=" . ($pag-1);
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
                echo '<a class="active" href="'.UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'.UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = UrlActual($_SERVER[REQUEST_URI]). "?search=$_GET[search]&pag=" . ($pag+1);
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
