<!-- Add jQuery library -->
<script type="text/javascript" src="../../public/venobox/jquery-latest.min.js"></script>

<!-- Add venobox -->
<link rel="stylesheet" href="../../public/venobox/venobox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../public/venobox/venobox.min.js"></script>

<?php 
      $login = LoginCheckBool();
?>
<style>
  .imagen_principal:hover {filter: opacity(.5);}

  .zoom:hover {
    transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }

</style>
<main id="main" class="site-main">
  <div class="container">
      <div id="primary">
        <div class="site-content" id="content">
          <h2 class="idol-title">U. Magazine</h2>
              <?php 
              if ($login)
              {
                  echo '
                  <div class="row">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#add_img"><span class="fa fa-plus" /> Nueva portada</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#edit_img"><span class="fa fa-pencil" /> Editar portada actual</button>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#delete_img"><span class="fa fa-times" /> Eliminar portada actual</button>
                    </div>
                  </div>
                  
                  <!-- subir_img -->
                  <div class="modal fade" id="add_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div class="site-content" id="content">
                        <h2 class="idol-title">Nueva portada</h2>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/magazine_add" autocomplete="off" enctype="multipart/form-data">
                          <p>
                          <span class="">
                              <input id="nombre" class="" type="text" value="" name="nombre" placeholder="Nombre de portada: " autocomplete="off">
                              </span>
                          </p>
                          <p>
                            <span class="">
                            <input id="numero" class="" type="text" value="" name="numero" placeholder="Numero de publicacion: " autocomplete="off">
                            </span>
                          </p>
                          <p>
                            <span class="">
                              <input id="f_publicacion" class="" type="date" value="" name="f_publicacion" placeholder="Fecha de publicacion: " autocomplete="off">
                            </span>
                          </p>
                          <p>
                            <span class="">
                              <input id="img" class="" type="file" value="" name="img" placeholder="Titulo: " accept="image/x-png,image/gif,image/jpeg" required>
                            </span>
                          </p>
                          <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                          <input type="hidden" id="id_img" name="id_img" value="'.$_GET['id_img'].'">
                          <input type="hidden" id="pag" name="pag" value="'.$_GET['pag'].'">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning">Actualizar</button>
                          </form>
                      </div>
                      </div>
                  </div>
              </div>

              <!-- Edit_img -->
                  <div class="modal fade" id="edit_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div class="site-content" id="content">
                        <h2 class="idol-title">Editar: '.$select->nombre.'</h2>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/magazine_update" autocomplete="off" enctype="multipart/form-data">
                          <p>
                          <span class="">
                              <input id="nombre" class="" type="text" value="'.$select->nombre.'" name="nombre" placeholder="Nombre de portada: " autocomplete="off">
                              </span>
                          </p>
                          <p>
                            <span class="">
                            <input id="numero" class="" type="text" value="'.$select->numero.'" name="numero" placeholder="Numero de publicacion: " autocomplete="off">
                            </span>
                          </p>
                          <p>
                            <span class="">
                              <input id="f_publicacion" class="" type="date" value="'.$select->f_publicacion.'" name="f_publicacion" placeholder="Fecha de publicacion: " autocomplete="off">
                            </span>
                          </p>
                          <p>
                          <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                          <input type="hidden" id="id" name="id" value="'.$select->id.'">
                          <input type="hidden" id="id_img" name="id_img" value="'.$_GET['id_img'].'">
                          <input type="hidden" id="pag" name="pag" value="'.$_GET['pag'].'">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning">Actualizar</button>
                          </form>
                      </div>
                      </div>
                  </div>
              </div>

              <!-- Delete_img -->
              <div class="modal fade" id="delete_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> '.$select->nombre.'</h5></strong>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar la portada: <strong>'.$select->nombre.'</strong>, edicion no. '.$select->numero.'. Publicada el : '.$select->f_publicacion.'?<BR>
                    </div>
                    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/magazine_delete" autocomplete="off">
                      <input type="hidden" id="id_img" name="id_img" value="'.$_GET['id_img'].'">
                      <input type="hidden" id="pag" name="pag" value="'.$_GET['pag'].'">
                    <div class="modal-footer">
                            <input type="hidden" id="id" name="id" value="'.$select->id.'">
                            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                            <button type="button" class="btn btn-success" data-dismiss="modal">NO, Cancelar</button>
                            <button type="submit" class="btn btn-danger">SI, Eliminar</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                  <br><hr>
                  ';
              }else
              {
                echo '
                  <div class="row">
                  <div class="col-sm-12">
                      <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#registrarme_umagazine">Quiero recibir U Magazine en mi domicilio</button>
                  </div>
                  </div>
                  
                  <!-- subir_img -->
                  <div class="modal fade" id="registrarme_umagazine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div class="site-content" id="content">
                        <h2 class="idol-title">Suscripción A U.Magazine - Anual $ 100.00 MXN</h2>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_img_add" autocomplete="off" enctype="multipart/form-data">
                          <p>
                          <span class="">
                              <input id="nombre" class="" type="text" value="" name="nombre" placeholder="Nombre completo: " autocomplete="off">
                              </span>
                          </p>
                          <p>
                          <span class="">
                              <input id="direccion" class="" type="text" value="" name="direccion" placeholder="Direccion donde recibira U.Magazine ?: " autocomplete="off">
                          </span>
                          </p>
                          <p>
                              <span class="">
                              <input id="email" class="" type="email" value="" name="email" placeholder="Correo electronico: " autocomplete="off">
                              </span>
                          </p>
                          <p>
                              <span class="">
                                  <input type="checkbox" name="r_informacion" id="r_informacion" value=""> Quiero recibir información por correo electronico. <br>
                                  <input type="checkbox" name="r_promo_nego" id="r_promo_nego" value=""> Quiero recibir promociones de negocios. <br>
                              </span>
                          </p>
                          <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]) ?>">
                          <input type="hidden" id="id_empresa" name="id_empresa" value="$_GET[id]">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Subir</button>
                          </form>
                      </div>
                      </div>
                  </div>
              </div>
                  <br>
                  <hr>
                  ';
              }
              echo ImgSelectMagazine($_GET['id_img']);
              ?>
              
              <div class="row">
                  <?php
                    foreach ($data as $item) {
                      echo '
                      <div class="col-sm-3">
                        <div class="text-center">
                          <a href="/index.php/'.UrlActual($_SERVER[REQUEST_URI]).'?id_img='.$item->id.'&pag='.$_GET[pag].'">
                            <span><strong>'.$item->nombre.'</strong></span><br><span><strong>Publicado: '.$item->f_publicacion.'</strong></span><br>
                            <img src="'.$item->url_img.'" class="zoom img-thumbnail" width="200" alt="Edicion #'.$item->numero.'">
                          </a>
                        </div>
                      </div>
                      ';
                    }
                  ?>
              </div>

              
              



              

        </div>
      </div>
  </div>
</main>
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
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=" . ($pag-1);
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
                echo '<a class="active" href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=" . ($pag+1);
                echo '<a href="'.$link.'">&raquo;</a>';
            }else
            {
                $link = "#";
                echo '<a href="'.$link.'">&raquo;</a>';
            }
        ?>
    </div>
</div>
<br>
<script>
    $(document).ready(function(){
        $('.venobox').venobox(); 
    });
    
    var venoOptions = {

    // is called after plugin initialization.
    cb_init: function(plugin){
        console.log('INIT');
        console.log(plugin);
    },

    // is called before the venobox pops up, return false to prevent opening;
    cb_pre_open : function(obj){
    console.log('PRE OPEN');
    console.log(obj);
    },
    

    // is called when opening is finished
    cb_post_open  : function(obj, gallIndex, thenext, theprev){
        console.log('POST OPEN');
        console.log('current gallery index: ' + gallIndex);
        console.log(thenext);
        console.log(theprev);
    },

    // is called before closing, return false to prevent closing
    cb_pre_close  : function(obj, gallIndex, thenext, theprev){
        console.log('PRE CLOSE');
        console.log('current gallery index: ' + gallIndex);
        console.log(thenext);
        console.log(theprev);
    },

    // is called after finished closing. 
    cb_post_close : function(){
        console.log('POST CLOSE');
    },

    // is called after a window resize.
    cb_post_resize: function(){
        console.log('POST RESIZE');
    },

    // is called after gallery navigation step
    cb_after_nav  : function(obj, gallIndex, thenext, theprev){
        console.log('POST NAV');
        console.log('current gallery index: ' + gallIndex);
        console.log(thenext);
        console.log(theprev);
    },
    }
    $('.venobox').venobox(venoOptions);
</script>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&autoLogAppEvents=1&version=v3.2&appId=358922931585815';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>