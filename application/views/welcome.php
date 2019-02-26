<style>
  .imagen_principal:hover {filter: opacity(.5);}

  .zoom:hover {
    transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }

</style>

<div class="row">
            <div id="primary" class="col-sm-8">
                <aside class="widget widget_text">
                <h2 class="widget-title">Categorias</h2>
              <div class="row">
              <?php
                foreach ($categories as $item) {
                  echo '
                  <div class="col-sm-6">
                    <div class="text-center">
                      <a href="'.base_url().'all/view_category_premium?id='.$item->id.'&pag=1">
                        <br><span><strong>'.strtoupper($item->name).'</strong></span><br>
                        <img src="'.$item->image.'" class="zoom img-thumbnail" alt="Categoria: '.$item->name.'" style="width:100%; height:234px">
                      </a>
                    </div>
                  </div>
                  ';
                }
              ?>
            </div>
            </div>
            
            <div id="secondary" class="col-sm-4">
              <aside class="widget widget_text">
                <h2 class="widget-title">Afiliados</h2>
                <br><br>
                <div class="row">
                <div id="_myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <?php
                        $cont = 1;
                        foreach ($_sliders as $item) {
                          if ($cont == 1){
                            $header = '<div class="item active">';  
                          }else{
                            $header = '<div class="item">';  
                          }
                          echo $header . '
                              <img src="'.$item->url_img.'" alt="'.$item->title.'" style="width:100%; height:260px;">
                            <div class="carousel-caption">
                              <h2 style="color: #FFFFFF; ">'.$item->title.'</h2>
                              <p>'.$item->descripcion.' | '.$item->name.'</p>
                            </div>
                          </div>
                          ';
                          $cont = $cont + 1;
                        }
                        ?>
                    
                  </div>

                  <!-- Left and right controls -->
                    <a class="left carousel-control" href="#_myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#_myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </aside>

              <aside class="widget widget_newsletter">
                <h2 class="widget-title">Suscribete ! </h2>
                <p>Recibe cada edicion MAGAZINE U, a domilio por solo $ 100 MXN !, Llena el formulario y deposita en el oxxo mas cercano.</p>
                <a href="#" data-toggle="modal" data-target="#registrarme_umagazine" ><input class="search-submit" type="submit" value="suscribirme"></a>
              </aside>
              
              <aside class="widget widget_text">
                <h2 class="widget-title">Zacatecas</h2>
                <div class="row">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <?php
                      $cont = 1;

                      foreach ($sliders as $item) {
                        if ($cont == 1){
                          $header = '<div class="item active">';  
                        }else{
                          $header = '<div class="item">';  
                        }
                        echo $header . '
                            <img src="'.$item->url.'" alt="'.$item->name.'" style="width:100%; height:260px;">
                          <div class="carousel-caption">
                            <a target="_BLANK" href="index.php/all/c_zacatecas?id_img='.$item->id.'"><h2 style="color: #FFFFFF; ">'.$item->name.'</h2></a>
                          </div>
                        </div>
                        ';
                        $cont = $cont + 1;
                      }
                      ?>
                    
                  </div>

                  <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </aside>


              <aside class="widget widget_newsletter">
                <h2>Redes sociales</h2>
                <div class="inline-social-icons">
                  <ul>
                  <li><a href="https://www.facebook.com/linkuzac/?modal=admin_todo_tour" target="_blank" class="fa fa-facebook-square"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCv72dPE4OO9HZ_JSUVL_HPA?disable_polymer=true" target="_blank" class="fa fa-youtube-play"></a></li>
                    <li><a href="https://www.instagram.com/linku.gestion/?utm_source=ig_profile_share&igshid=1vkm4f8uy46jr" target="_blank" class="fa fa-instagram"></a></li>
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
        