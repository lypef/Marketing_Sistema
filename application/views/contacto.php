<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <main id="main" class="site-main">
      <div class="container">
          <div id="primary" class="">
            <div class="site-content" id="content">
              <h2 class="idol-title">Contactanos</h2>
              <article class="post">
                <div class="post-content-wrap">
                  <aside class="widget widget-contact-detail row">
                    <div class="col-sm-12 blog-contact-detail">
                      <div class="contact-detail-icon">
                        <span class="fa fa-map"></span>
                      </div>
                      <div class="entry-content">
                        <p>Porque toda empresario merece su espacio, contamos con un centro de negocios donde podremos atenderte de la mejor manera.</p>
                      </div>
                      <ul>
                        <li><span class="fa fa-map-marker"></span>Calle De La Unión 108, Centro, Zacatecas</li>
                        <br><li><span class="fa fa-calendar-check-o"></span>Citas: 492 145 07 91</li>
                      </ul>
                    </div>
                  </aside>
                  
                  <center>
                    <button data-trigger="focus" data-toggle="popover" title="We Go" data-content="Estamos diseñando el click qué necesitas para tener lo que quieres y en la puerta de tu casa, esperalo muy pronto..." type="button" class="btn btn-success btn-lg" data-placement="top"><span class="fa fa-shopping-cart"></span> We Go</button>
                    <button data-trigger="focus" data-toggle="popover" title="U Car" data-content="Muy pronto la manera de viajar dentro y fuera de tu ciudad, no volverá a ser la misma.. U Car, muy pronto en tu ciudad, esperalo..." type="button" class="btn btn-info btn-lg" data-placement="top"><span class="fa fa-car"></span> U Car</button>
                    <button data-trigger="focus" data-toggle="popover" title="U Magazine" data-content="Adquiere en cualquier Oxxo nuestra revista mensual o si prefieres, desde nuestra página suscribete por sólo $100 anuales y recibela en tu domicilio. En ella encontrarás  reportajes a profesionales de la salud hablando de temas específicos, entretenimiento, cultura, agenda de eventos del mes en Zacatecas, tips de belleza, política actual, entre otros temas relevantes y de interés social." type="button" class="btn btn-warning btn-lg" data-placement="top"><span class="fa fa-newspaper-o "></span> U Magazine</button>
                  </center>
                  </div>
                  <hr>
                  <div class="entry-content contact-columns-3">
                  <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/servicio_inteserado">
                      <p>
                        <span class="">
                          <input id="nombre" class="" type="text" value="" name="nombre" placeholder="Nombre:" required>
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="empresa" class="" type="text" value="" name="empresa" placeholder="Empresa:">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="web" class="" type="url" value="" name="web" placeholder="http://www.mipagina.com">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="asunto" class="" type="text" value="" name="asunto" placeholder="Asunto:">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="telefono" class="" type="number" value="" name="telefono" placeholder="Telefono:" required>
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="email" class="" type="email" value="" name="email" placeholder="Email:" required>
                        </span>
                      </p>
                      <p class="contact-textarea">
                        <span class="">
                          <textarea id="comentario" name="comentario" class="" rows="6" value="" placeholder="Escribe aqui tu comentario ..."></textarea>
                        </span>
                      </p>
                        <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER[REQUEST_URI]); ?>">
                      <p class="contact-submit">
                        <input class="wpcf7-submit" type="submit" value="Enviar">
                      </p>
                    </form>
                  </div>
                </div>
              </article>
            </div>
          </div>
      </div>
    </main>
<script>
  $('.popover-dismiss').popover({
    trigger: 'focus'
  })

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
</script>