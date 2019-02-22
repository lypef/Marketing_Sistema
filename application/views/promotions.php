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
          <h2 class="idol-title">Promociones</h2>
              <?php 
              if ($login)
              {
                  echo '
                  
                <!-- Delete_img -->
                <div class="modal fade" id="delete_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <strong><h5 class="modal-title" id="exampleModalLongTitle"><span class="fa fa-exclamation" /> Eliminar promocion</h5></strong>
                        </div>
                        <div class="modal-body">
                            Esta seguro de eliminar la promocion actual ?<BR>
                        </div>
                        <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/promotion_delete" autocomplete="off">
                        <input type="hidden" id="id" name="id" value="'.$_GET['id_img'].'">
                        <input type="hidden" id="pag" name="pag" value="'.$_GET['pag'].'">
                        <div class="modal-footer">
                                <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                                <button type="button" class="btn btn-success" data-dismiss="modal">NO, Cancelar</button>
                                <button type="submit" class="btn btn-danger">SI, Eliminar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                  <br>
                  ';
              }
              if ($login)
              {
                  echo ImgSelectPromotion($_GET['id_img']);
              }else {
                  echo ImgSelectPromotionNoLogin($_GET['id_img']);
              }
              ?>
              <?php if ($login){ ?>
              <form class="search-form">
                <label>
                    <div class="row">
                        <div class="col-sm-11">
                            <input class="search-field" type="search" placeholder="Ingrese responsable o empresa para buscar" value="<?php echo $_GET['search'] ?>" name="search" autocomplete="off">
                            <input type="hidden" id="id_img" name="id_img" value="<?php echo $_GET['id_img'] ?>">
                            <input type="hidden" id="pag" name="pag" value="<?php echo $_GET['pag'] ?>">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-default" style="height: 50px;" width="100%"><span class="fa fa-search" /></button>
                        </div>
                    </div>
                </label>
            </form>
              <div class="row">
                  <?php
                    foreach ($data as $item) {
                      echo '
                      <div class="col-sm-2">
                        <div class="text-center">
                          <br><a href="'.UrlActual($_SERVER[REQUEST_URI]).'?id_img='.$item->id.'&pag='.$_GET[pag].'">
                            <span><strong>'.$item->name.'</strong></span><br>
                            <img src="'.$item->url.'" class="zoom img-thumbnail" alt="'.$item->name.'" style="width: 100%; height: 200px;">
                          </a><br><br><br>
                        </div>
                      </div>
                      ';
                    }
                  ?>
              </div>
            <?php } ?>
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

<?php if ($login){ ?>
<div class="center">
    <div class="pagination">
        <?php 
            if ($pag > 1)
            {
                $link = UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=" . ($pag-1);
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
                echo '<a class="active" href="'. UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'. UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = UrlActual($_SERVER[REQUEST_URI]). "?id_img=$_GET[id_img]&pag=" . ($pag+1);
                echo '<a href="'.$link.'">&raquo;</a>';
            }else
            {
                $link = "#";
                echo '<a href="'.$link.'">&raquo;</a>';
            }
        ?>
    </div>
</div>
<?php } ?>
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