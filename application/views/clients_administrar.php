<?php 
      $login = LoginCheckBool();
?>
<!-- Add jQuery library -->
<script type="text/javascript" src="../../public/venobox/jquery-latest.min.js"></script>

<!-- Add venobox -->
<link rel="stylesheet" href="../../public/venobox/venobox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../public/venobox/venobox.min.js"></script>

<div class="site-content" id="content">
<h2 class="idol-title"><?php echo $item->empresa; ?></h2>
</div>

<div class="container">
  
  <?php
    if ($login)
    {
        echo '
        <div class="row">
        <div class="col-sm-6">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#subir_img">Subir imagen</button>
            
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#subir_vdo">Subir video</button>
        </div>
    </div>
    
    <br><hr>
        ';
    }
  ?>
</div>
<div class="container">
    <div id="primary">
    <div class="site-content" id="content">
    
    <div class="portfolio-section os-animation post" data-os-animation="animated-portfolio-section">
    <div id="filters" class="button-group postname-categories">
        <button class="button is-checked" data-filter="*">Todos</button>
        <button class="button" data-filter=".img">Imagenes</button>
        <button class="button" data-filter=".vdo">Videos</button>
        <button class="button" data-filter=".fav">Favoritos</button>
    </div>
    </div>
    
    <div class="isotope">

        <?php
            foreach ($gallery as $item) {
                $check_premium = 'checked';
                $value_premium = 1;
                $premium_icono = '';
                $category = '';

                if (!$item->premium)
                {
                    $check_premium = '';
                    $value_premium = 0;
                }
                
                if ($value_premium > 0)
                {
                    $category = 'fav ';
                    $premium_icono = '
                        <a href="#" data-toggle="modal" data-target="#premium'.$item->id.'"><span class="fa fa-star"></span></a>
                    ';
                }

                if (strpos($item->url, 'youtube') !== false) {
                    $category .= 'vdo';
                    $figure = '<figure><img alt="" src="'.$item->url_img.'" style="height:245px; max-height: 245px; width:100%;"></figure>';
                    $view = '<a class="venobox" data-autoplay="true" data-vbtype="video" href="'.$item->url.'"><span class="fa fa-youtube-play"></span></a>';
                }else
                {
                    $category .= 'img';
                    $figure = '<figure><img alt="" src="'.$item->url_img.'"></figure>';
                    $view = '<a class="venobox" data-gall="myGallery" href="'.$item->url.'" title="'.$item->descripcion.' ('.$item->tags.')"><span class="fa fa-eye"></span></a>';
                }

                if ($login)
                {
                    $pencil_trash = '
                    <a href="#" data-toggle="modal" data-target="#editar'.$item->id.'"><span class="fa fa-pencil"></span></a>
                    <a href="#" data-toggle="modal" data-target="#delete'.$item->id.'"><span class="fa fa-trash"></span></a>
                    ';
                }
                echo '
                <div class="element-item '.$category.'">
                    <div class="masonry-inner">
                    <article class="gallery-post">
                        '.$figure.'
                        <header class="entry-header">
                        '.$premium_icono. $view.'
                        <a href="#" data-toggle="modal" data-target="#comments'.$item->id.'" title="Comentarios"><span class="fa fa-comments"></span></a>
                        <a href="#" data-toggle="modal" data-target="#send'.$item->id.'"><span class="fa fa-send"></span></a>
                        '.$pencil_trash.'
                        <h2 class="entry-title">'.$item->descripcion.'</h2>
                        <div class="entry-meta">
                            <span class="tag-links">
                            <a href="#" target="_self">'.$item->tags.'</a>
                            </span>
                        </div>
                        </header>
                    </article>
                    </div>
                </div>

                <!-- Comentarios -->
                <div class="modal fade" id="comments'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <div class="fb-comments" data-href="http://localhost/index.php/All/manager/'.$item->id.'" data-numposts="10" order_by="reverse_time"></div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ocultar</button>
                    </div>
                    </div>
                </div>
                </div>
                
                    <!-- Enviar invitacion por email -->
                    <div class="modal fade" id="send'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-body">
                        <div class="site-content" id="content">
                        <h2 class="idol-title">Enviar invitacion para: '.$item->title.'</h2>
                        </div>
                            <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_sendmail">
                            <p>
                            <span class="">
                                <input id="emails" class="" type="text" value="" name="emails" placeholder="Ingrese emails, separados por (,)">
                                </span>
                            </p>
                            <input type="hidden" id="title" name="title" value="'.$item->title.'">
                            <input type="hidden" id="descripcion" name="descripcion" value="'.$item->descripcion.'">
                            <input type="hidden" id="url_cont" name="url_cont" value="'.$item->url.'">
                            <input type="hidden" id="url_image" name="url_image" value="'.$item->url_img.'">
                            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                            <input type="hidden" id="id_empresa" name="id_empresa" value="'.$item->empresa.'">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    
                    <!-- Imagen premium -->
                    <div class="modal fade" id="premium'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-body">
                            <div class="site-content" id="content">
                            <h2 class="idol-title">'.$item->title.'</h2>
                            </div>
                        Esta imagen esta marcada como favorita.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Eliminar imagen -->
                    <div class="modal fade" id="delete'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> '.$item->title.'</h5></strong>
                        </div>
                        <div class="modal-body">
                            Esta seguro de eliminar la imagen: <strong>'.$item->descripcion.'</strong> ?<BR>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_img_delete" autocomplete="off">
                        <div class="modal-footer">
                                <input type="hidden" id="id" name="id" value="'.$item->id.'">
                                <input type="hidden" id="id_empresa" name="id_empresa" value="'.$_GET['id'].'">
                                <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                                <button type="button" class="btn btn-success" data-dismiss="modal">NO, Cancelar</button>
                                <button type="submit" class="btn btn-danger">SI, Eliminar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Editar fotografia -->
                    <div class="modal fade" id="editar'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                        
                        <div class="site-content" id="content">
                        <h2 class="idol-title">Actualizar datos de: '.$item->title.'</h2>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_img_Update" autocomplete="off">
                                <p>
                                <span class="">
                                    <input id="title" class="" type="text" value="'.$item->title.'" name="title" placeholder="Titulo: " autocomplete="off">
                                    </span>
                                </p>
                                <p>
                                    <span class="">
                                        <input id="descripcion" class="" type="text" value="'.$item->descripcion.'" name="descripcion" placeholder="Descripcion: " autocomplete="off">
                                    </span>
                                </p>
                                <p>
                                    <span class="">
                                    <input id="tags" class="" type="text" value="'.$item->tags.'" name="tags" placeholder="Etiquetas: " autocomplete="off">
                                    </span>
                                </p>
                                <p>
                                    <span class="">
                                        <input type="checkbox" name="premium" id="premium" value="'.$value_premium.'" '.$check_premium.'> Seleccionar como premium. <br>
                                    </span>
                                </p>
                                <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                                <input type="hidden" id="id" name="id" value="'.$item->id.'">
                                <input type="hidden" id="id_empresa" name="id_empresa" value="'.$_GET['id'].'">

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

    </div>
    </div>
    </div>
</div>
<!--Subir archivos-->
    <!-- subir_img -->
        <div class="modal fade" id="subir_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-body">
                <div class="site-content" id="content">
                <h2 class="idol-title">Subir nueva imagen</h2>
                </div>
                <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_img_add" autocomplete="off" enctype="multipart/form-data">
                    <p>
                    <span class="">
                        <input id="title" class="" type="text" value="" name="title" placeholder="Titulo: " autocomplete="off">
                        </span>
                    </p>
                    <p>
                    <span class="">
                    <input id="descripcion" class="" type="text" value="" name="descripcion" placeholder="Descripcion: " autocomplete="off">
                    </span>
                    </p>
                    <p>
                        <span class="">
                        <input id="tags" class="" type="text" value="" name="tags" placeholder="Etiquetas: " autocomplete="off">
                        </span>
                    </p>
                    <p>

                    <div class="row">
                    <div class="col-sm-6" align="center">
                        <span class="">
                            <input id="img" class="" type="file" value="" name="img" placeholder="Titulo: " accept="image/x-png,image/gif,image/jpeg" required>
                            </span>
                        </p>

                    </div>
                    <div class="col-sm-6" align="center">
                        <p>
                            <span class="">
                                <input type="checkbox" name="premium" id="premium" value=""> Marcar como premium. <br>
                            </span>
                        </p>
                    </div>
                    </div>
                    <span style="color:red">* Solo aceptamos imagenes de 900px * 600px.</span>
                    <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]) ?>">
                    <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $_GET['id'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    <!-- subir_vdo -->
        <div class="modal fade" id="subir_vdo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-body">
                <div class="site-content" id="content">
                <h2 class="idol-title">Subir nuevo video</h2>
                </div>
                <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/clients_administrar_vdo_add" autocomplete="off">
                    <p>
                    <span class="">
                        <input id="url_vdo" class="" type="text" value="" name="url_vdo" placeholder="Ingrese url de youtube: " autocomplete="off">
                        </span>
                    </p>
                    <p>
                    <span class="">
                        <input id="title" class="" type="text" value="" name="title" placeholder="Titulo: " autocomplete="off">
                        </span>
                    </p>
                    <p>
                    <span class="">
                    <input id="descripcion" class="" type="text" value="" name="descripcion" placeholder="Descripcion: " autocomplete="off">
                    </span>
                    </p>
                    <p>
                        <span class="">
                        <input id="tags" class="" type="text" value="" name="tags" placeholder="Etiquetas: " autocomplete="off">
                        </span>
                    </p>
                    <p>
                        <span class="">
                            <input type="checkbox" name="premium" id="premium" value=""> Marcar como premium. <br>
                        </span>
                    </p>
                    <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]) ?>">
                    <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $_GET['id'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
<!-- Finaliza subir archivos -->

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