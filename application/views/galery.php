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
<?php
  if ($login)
  {
    echo ImgSelectGalleryLogin($_GET['id']);
  }else
  {
    echo ImgSelectGallery($_GET['id']);
  }
?>
<div class="isotope">
<?php
    
    foreach ($data as $item) {
        
        echo '
        <div class="element-item">
            <div class="masonry-inner">
            <article class="gallery-post">
                <figure><img alt="" class="img-thumbnail" src="'.$item->url.'" style="height:245px; max-height: 245px; width:100%;"></figure>
                <header class="entry-header">
                  <a class="venobox" data-gall="myGallery" href="'.$item->url.'" title="'.$item->tite.'"><span class="fa fa-eye"></span></a>
                  <a href="'.base_url().'All/galery?id='.$item->id.'" title="Comentarios"><span class="fa fa-comments"></span></a>
                <h2 class="entry-title">'.$item->empresa.'</h2>
                <div class="entry-meta">
                    <span class="tag-links">
                    <a href="#" target="_self">'.$item->title .'</a>
                    </span>
                </div>
                </header>
            </article>
            </div>
        </div>
        ';
    }
?>
</div>

<!-- subir_img -->
<div class="modal fade" id="add_img_gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-body">
      <div class="site-content" id="content">
      <h2 class="idol-title">Subir nueva imagen</h2>
      </div>
      <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/gallery_add" autocomplete="off" enctype="multipart/form-data">
        <p>
        <span class="">
            <input id="title" class="" type="text" value="" name="title" placeholder="Titulo de la imagen: " autocomplete="off">
            </span>
        </p>
        <p>
          <span class="">
            <input id="img" class="" type="file" value="" name="img" placeholder="Titulo: " accept="image/x-png,image/gif,image/jpeg" required>
          </span>
        </p>
        <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]); ?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Agregar</button>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Finaliza add imagen gallery -->

<!-- Delete_img -->
<div class="modal fade" id="delete_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> Eliminar imagen actual</h5></strong>
    </div>
    <div class="modal-body">
        Esta seguro de eliminar la imagen y comentarios actuales ?<BR>
    </div>
    <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/gallery_delete" autocomplete="off">
    <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]); ?>">
            <button type="button" class="btn btn-success" data-dismiss="modal">NO, Cancelar</button>
            <button type="submit" class="btn btn-danger">SI, Eliminar</button>
        </form>
    </div>
    </div>
</div>
</div>
<!-- FinalizaDeleteImg -->
<br><br>
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