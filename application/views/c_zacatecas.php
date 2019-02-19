<!-- Add jQuery library -->
<script type="text/javascript" src="../../public/venobox/jquery-latest.min.js"></script>

<!-- Add venobox -->
<link rel="stylesheet" href="../../public/venobox/venobox.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../public/venobox/venobox.min.js"></script>

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
          <h2 class="idol-title">Conoce Zacatecas</h2>
              <?php 
                echo ImgSelectC_zacatecas($_GET['id_img']);
              ?>
              <div class="row">
                  <?php
                    foreach ($data as $item) {
                      echo '
                      <div class="col-sm-6">
                        <div class="text-center">
                          <br>
                          <a href="'.UrlActual($_SERVER[REQUEST_URI]).'?id_img='.$item->id.'">
                            <span><strong>'.$item->name.'</strong></span><br>
                            <img src="'.$item->url.'" class="zoom img-thumbnail" alt="'.$item->name.'" style="height:300px;">
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