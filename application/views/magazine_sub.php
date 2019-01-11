<form class="search-form">
    <label>
        <div class="row">
            <div class="col-sm-11">
                <input class="search-field" type="search" placeholder="Ingrese responsable o empresa para buscar" value="<?php echo $_GET['search'] ?>" name="search" autocomplete="off">
                <input type="hidden" id="pag" name="pag" value="1">
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
      <th scope="col">REFERENCIA</th>
      <th scope="col">SUSCRIPTOR</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">ESTATUS</th>
      <th scope="col"><center>OPCIONES</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($data as $item ){
            if ($item->estatus > 0){
                $estatus = '<a href="#" data-toggle="modal" data-target="#ver'.$item->id.'">
                                <center><h4><span class="label label-success"><span class="fa fa-check" /> Activo</span></h4></center>
                            </a>';
            }
            else{
                $estatus = '<a href="#" data-toggle="modal" data-target="#ver'.$item->id.'">
                                <center><h4><span class="label label-danger"><span class="fa fa-times" /> Vencido</span></h4></center>
                            </a>';
            }
            $info_email = ''; $promo_nego = ''; $estatus_ = '';

            if ($item->info_email > 0){ $info_email = 'checked';}
            if ($item->promo_nego > 0){ $promo_nego = 'checked';}
            if ($item->estatus > 0){ $estatus_ = 'checked';}

            echo '
            <tr>
                <th scope="row">'.$item->id.'</th>
                <td>'.$item->name.'</td>
                <td>'.$item->phone.'</td>
                <td>'.$estatus.'</td>
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
                    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> '.$item->name.'</h5></strong>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar el suscriptor: <strong>'.$item->name.'</strong> ?<BR>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/magazine_sub_delete" autocomplete="off">
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
                    <h2 class="idol-title">Actualizar datos de: '.$item->name.'</h2>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/magazine_sub_update" autocomplete="off">
                            <p>
                            <span class="">
                                <input id="name" class="" type="text" value="'.$item->name.'" name="name" placeholder="Nombre completo:" autocomplete="off">
                                </span>
                            </p>
                            <p>
                            <span class="">
                                <input id="direccion" class="" type="text" value="'.$item->direccion.'" name="direccion" placeholder="Direccion donde recibira U.Magazine ?: " autocomplete="off">
                            </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="email" class="" type="email" value="'.$item->email.'" name="email" placeholder="Correo electronico: " required>
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="phone" class="" type="text" value="'.$item->phone.'" name="phone" placeholder="Numero movil: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                <input id="f_ini" class="" type="date" value="'.$item->f_ini.'" name="f_ini" placeholder="Fecha de inicio: " autocomplete="off">
                                </span>
                            </p>
                            <p>
                                <span class="">
                                    <input type="checkbox" name="estatus" id="estatus" '.$estatus_.'> Suscriptor activo <br>
                                    <input type="checkbox" name="r_informacion" id="r_informacion" '.$info_email.'> Quiero recibir información por correo electronico. <br>
                                    <input type="checkbox" name="r_promo_nego" id="r_promo_nego" '.$promo_nego.'> Quiero recibir promociones de negocios. <br>
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
                <strong>NOMBRE: </strong>'.$item->name.'<p><p>
                <strong>DIRECCION: </strong>'.$item->direccion.'<p><p>
                <strong>FECHA DE INICIO: </strong>'.$item->f_ini.'<p><p>
                <strong>EMAIL: </strong> '.$item->email.' | <strong> TELEFONO: </strong>'.$item->phone.'<p><p>
                <strong>REFERENCIA: </strong># '.$item->id.'<p><p>
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
