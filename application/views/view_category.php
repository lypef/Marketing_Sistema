<div id="preloader" class="preloader" style="display: none;">
    <div class="preloader-area">
        <div class="spinner"></div>
    </div>
</div>


<?php 
      $login = LoginCheckBool();
?>
<!-- Add jQuery library -->
<script type="text/javascript" src="../../public/venobox/jquery-latest.min.js"></script>

<!-- Add venobox -->
<link rel="stylesheet" href="../../public/venobox/venobox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../public/venobox/venobox.min.js"></script>
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



.postname-categories {
    float: none;
}
.portfolio-section {
    padding-bottom: 30px;
}
.gallery-post .entry-header {
    background: rgba(3, 146, 206, 0.8) none repeat scroll 0 0;
    bottom: 0;
    height: 100%;
    left: 0;
    padding: 14% 0 0;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    width: 100%;
}
.gallery-post:hover .entry-header{
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.gallery-post {
    position: relative;
}
.gallery-post .entry-title {
    color: rgb(255, 255, 255);
    font-size: 16px;
    font-weight: 400 !important;
    padding: 10px 0;
}
.gallery-post .entry-meta, 
.gallery-post .entry-meta a {
    color: rgb(255, 255, 255);
}
.gallery-post .entry-header > a span::before {
    color: #0392CE;
    display: inline-block;
    font-size: 15px;
}
.gallery-post .entry-header > a {
    background: rgb(255, 255, 255) none repeat scroll 0 0;
    border-radius: 50%;
    display: inline-block;
    height: 35px;
    margin: 0 3px;
    padding: 6px 0 0;
    width: 35px;
}
.gallery-post .entry-header > a:hover{
    background: rgba(255, 255, 255, 0.7) none repeat scroll 0 0;
}
.tag-links > a {
    cursor: text;
}
.tag-links > a:hover{
    color: rgb(255, 255, 255);
}
.gallery-post figure img {
    width: 100%;
}

</style>
<?php
    echo GetCategoriesFilters($_GET['id']);
?>
<div class="center">
    <div class="pagination">
        <?php 
            if ($pag > 1)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=" . ($pag-1);
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
                echo '<a class="active" href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=" . ($pag+1);
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
<div class="isotope">
<?php
    foreach ($data as $item) {
        
        $premium_icono = '';

        if (strpos($item->url, 'youtube') !== false) {
            $view = '<a class="venobox" data-autoplay="true" data-vbtype="video" href="'.$item->url.'"><span class="fa fa-youtube-play"></span></a>';
        }else
        {
            $view = '<a class="venobox" data-gall="myGallery" href="'.$item->url.'" title="['.$item->empresa.']: '.$item->title.' - '. $item->descripcion .' ('.$item->tags.')"><span class="fa fa-eye"></span></a>';
        }

        if ($item->premium > 0)
        {
            $premium_icono = '
                <a href="#" data-toggle="modal" data-target="#premium'.$item->id.'"><span class="fa fa-star"></span></a>
            ';
        }

        echo '
        <div class="element-item">
            <div class="masonry-inner">
            <article class="gallery-post">
                <figure><img alt="" src="'.$item->url_img.'"></figure>
                <header class="entry-header">
                '.$premium_icono. $view.'
                <a target="_BLANK" href="/index.php/all/clients_administrar?id='.$item->cl_id_empresa.'"><span class="fa fa-image" title="Ver galeria de '.$item->empresa.'"></span></a>
                <a href="#" data-toggle="modal" data-target="#comments'.$item->id.'" title="Comentarios"><span class="fa fa-comments"></span></a>
                <a href="#" data-toggle="modal" data-target="#send'.$item->id.'" title="Enviar a un amigo"><span class="fa fa-send"></span></a>
                <h2 class="entry-title">'.$item->empresa.'</h2>
                <div class="entry-meta">
                    <span class="tag-links">
                    <a href="#" target="_self">'.$item->title .'<br>'.$item->descripcion.'</a>
                    </span>
                </div>
                </header>
            </article>
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
                <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/category_administrar_sendmail">
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
                <input type="hidden" id="id_empresa" name="id_empresa" value="'.$item->cl_id_empresa.'">
                <input type="hidden" id="category" name="category" value="'.$_GET['id'].'">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Comentarios -->
        <div class="modal fade" id="comments'.$item->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
                <center><img alt="" src="'.$item->url_img.'"></center>
                <br>
                <div class="fb-comments" data-href="http://localhost/index.php/All/manager/'.$item->id.'" data-numposts="10" order_by="reverse_time"></div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ocultar</button>
            </div>
            </div>
        </div>
        </div>
        ';
    }
?>
</div>
<br>
<div class="center">
    <div class="pagination">
        <?php 
            if ($pag > 1)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=" . ($pag-1);
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
                echo '<a class="active" href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=$i" .'">'.$i.'</a>';
            }else
            {
                echo '<a href="'. "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=$i" .'">'.$i.'</a>';
            }
        }

        ?>
        <?php 
            if ($pag < $pags)
            {
                $link = "/index.php/".UrlActual($_SERVER[REQUEST_URI]). "?id=$_GET[id]&pag=" . ($pag+1);
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