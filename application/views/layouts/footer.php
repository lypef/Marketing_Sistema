</div>
      <footer id="colophon" class="site-footer" >
      <div class="widget-wrap">
        <div class="widget-wrap-bg"></div>
        <div class="container">
          <div class="widget-area">
            <div class="row">
              <div class="col-sm-4">
                <aside class="widget widget_text">
                  <div class="site-info">
                    <h1 class="site-title">
                      <a href="/" target="_self"><img alt="" src="../../public/images/footer-logo_.png"></a>
                    </h1>  
                  </div>
                  <div class="textwidget text-justify">En link u projects somos un equipo de profesionales dedicados a realizar proyectos de expansión comercial para empresas, pymes y emprendedores.</div>
                  <div class="inline-social-icons">
                    <ul>
                      <li><a href="https://www.facebook.com/linkuzac/?modal=admin_todo_tour" target="_blank" class="fa fa-facebook-square"></a></li>
                      <li><a href="https://www.youtube.com/channel/UCv72dPE4OO9HZ_JSUVL_HPA?disable_polymer=true" target="_blank" class="fa fa-youtube-play"></a></li>
                      <li><a href="https://www.instagram.com/linku.gestion/?utm_source=ig_profile_share&igshid=1vkm4f8uy46jr" target="_blank" class="fa fa-instagram"></a></li>
                    </ul>
                  </div>
                </aside>
              </div>
              <div class="col-sm-4">
                <aside class="widget">
                  <h2 class="widget-title">Categorias</h2>
                  <ul>
                    <?php echo GetCategoriesLI(); ?>
                  </ul>
                </aside>
              </div>
              <div class="col-sm-4">
                <aside class="widget widget-links">
                  <h2 class="widget-title">Like Us on Facebook</h2>
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flinkuzac&tabs=timeline&width=340&height=450&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </aside>
              </div>
            </div>
          </div> 
        </div>
        <div class="copy-right">
          <div class="container">
            <span>© 2019 <a target="_blank" href="http://www.cyberchoapas.com">| CLTA DESARROLLO &amp; DISTRIBUCION DE SOFTWARE</a> &amp; <a target="_blank" href="https://www.facebook.com/softboxzac/"> SoftBox Zacatecas</a></span>
          </div> 
        </div> 
      </div>
    </footer>

    
    <!-- Modal Quienes somos -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
          <hr>
          <center><img src="../../public/images/site-logo1.png" alt=""></center>
          <br>
          EN LINK U PROJECTS SOMOS UN EQUIPO DE PROFESIONALES DEDICADOS A REALIZAR PROYECTOS DE EXPANSIÓN COMERCIAL PARA EMPRESAS, PyMES Y EMPRENDEDORES. 
          <br><br>PONIENDO A SU ALCANCE  NUESTRAS MEJORES HERRAMIENTAS PARA ASI POSICIONAR SUS MARCAS Y PRODUCTOS SOBRE CUALQUIER COMPETENCIAS.
          <br><br>NUESTRO OBJETIVO ES BRINDAR EL MEJOR SERVICIO CON LA MEJOR CALIDAD Y A UN BAJO COSTO, DE ESTA MANERA LOGRAMOS VINCULAR LA ECONOMÍA DEL CONSUMIDOR CON LA DE NUESTROS CLIENTES Y A SU VEZ LA DE ELLOS CON LA NUESTRA.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Finaliza Modal Quienes somos -->

    <!-- Modal Agregar cliente -->
    <?php
    if ($this->session->userdata('username'))
    {
      echo '
      <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
            
            <div class="site-content" id="content">
            <h2 class="idol-title">Ingrese los datos correspondientes</h2>
            </div>
            <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/client_add" autocomplete="off">
                      <p>
                        <span class="">
                          '.GetCategoriesSelect().'
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="empresa" class="" type="text" value="" name="empresa" placeholder="Empresa: " autocomplete="off" required>
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="direccion" class="" type="text" value="" name="direccion" placeholder="Direccion: " autocomplete="off">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="email" class="" type="email" value="" name="email" placeholder="Email: " autocomplete="off">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="telefono" class="" type="number" value="" name="telefono" placeholder="Telefono: " autocomplete="off">
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="responsable" class="" type="text" value="" name="responsable" placeholder="Responsable: " autocomplete="off">
                        </span>
                      </p>
                      <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Agregar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
    <!-- Finaliza Modal Agregar cliente -->

    <!-- Modal Agregar promo -->
    <?php
    if ($this->session->userdata('username'))
    {
      echo '
      <div class="modal fade" id="addpromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            
            <div class="site-content" id="content">
            <h2 class="idol-title">Ingrese nueva promocion</h2>
            </div>
            <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/promo_add" enctype="multipart/form-data">
            <p>
              <span class="">
                <br><input id="name" class="" type="text" value="" name="name" placeholder="Nombre promocion: ">
              </span>
            </p>
            <span>*** Selecciona imagen para subir</span>
            <p>
              <span class="">
                <br><input id="img" class="" type="file" value="" name="img" placeholder="Titulo: " accept="image/x-png,image/gif,image/jpeg" required>
              </span>
            </p>
            <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Subir</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
    <!-- Finaliza Modal Agregar promo -->
    
    <!-- Modal Agregar qr -->
    <?php
    if ($this->session->userdata('username'))
    {
      echo '
      <div class="modal fade" id="addqr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
            
            <div class="site-content" id="content">
            <h2 class="idol-title">Ingrese datos para QR</h2>
            </div>
            <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/qr_add">
                      <p>
                        <span class="">
                          '.GetClientsSelect().'
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="name" class="" type="text" value="" name="name" placeholder="Nombre promocion: " required>
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="descripcion" class="" type="text" value="" name="descripcion" placeholder="Descripcion promocion: " required>
                        </span>
                      </p>
                      <p>
                        <span class="">
                          <input id="url_promo" class="" type="url" value="" name="url_promo" placeholder="Url direccion de promocion:">
                        </span>
                      </p>
                      <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Agregar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    ?>
    <!-- Finaliza Modal Agregar qr -->

    <!-- Modal Agregar usuario -->
    <?php
    if ($this->session->userdata('username'))
    {
      echo '
      <div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
            
            <div class="site-content" id="content">
            <h2 class="idol-title">Ingrese los datos de un nuevo usuario</h2>
            </div>
            <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/users_add" autocomplete="off">
                      <p>
                          <span class="">
                          <input id="name" class="" type="text" value="" name="name" placeholder="Nombre: " autocomplete="off">
                          </span>
                      </p>
                      <p>
                          <span class="">
                          <input id="mail" class="" type="email" value="" name="mail" placeholder="Email: " autocomplete="off" required>
                          </span>
                      </p>
                      <p>
                          <span class="">
                          <input id="username" class="" type="text" value="" name="username" placeholder="Nombre de usuario: " autocomplete="off" required>
                          </span>
                      </p>
                      <p>
                          <span class="">
                          <input id="password" class="" type="password" value="" name="password" placeholder="Contraseña: " autocomplete="off" required>
                          </span>
                      </p>
                      <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" >Agregar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
    }

    if (!$this->session->userdata('username')){
      echo '
        <!-- Recibir revista u magazine -->
        <div class="modal fade" id="registrarme_umagazine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
              <div class="modal-body">
              <div class="site-content" id="content">
              <h2 class="idol-title">Suscripción A U.Magazine - Anual $ 100.00 MXN</h2>
              </div>
              <form method="post" class="wpcf7-form cmxform" id="commentForm" action="/index.php/All/register_magazine" enctype="multipart/form-data">
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
                    <input id="email" class="" type="email" value="" name="email" placeholder="Correo electronico: " required>
                    </span>
                </p>
                <p>
                    <span class="">
                    <input id="phone" class="" type="number" value="" name="phone" placeholder="Numero movil: " autocomplete="off">
                    </span>
                </p>
                <p>
                    <div class="col-sm-6">
                    <span class="">
                        <input type="checkbox" name="r_informacion" id="r_informacion" value="" checked> Quiero recibir información por correo electronico. <br>
                        <input type="checkbox" name="r_promo_nego" id="r_promo_nego" value="" checked> Quiero recibir promociones de negocios. <br>
                    </span>
                    </div>
                    
                    <div class="col-sm-6">
                      <div class="g-recaptcha" data-sitekey="6LcS24gUAAAAAP6hLsQiZeh8fMxHuGPZfg25jcXP" align="center"></div>
                    </div>
                </p>
                <input type="hidden" id="url" name="url" value="'.UrlActual($_SERVER[REQUEST_URI]).'">
                <input type="hidden" id="pag" name="pag" value="'.$_GET[pag].'">
                <input type="hidden" id="id_img" name="id_img" value="'.$_GET[id_img].'">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Suscribirme</button>
                </form>
            </div>
            </div>
        </div>
    </div>
      ';
    }
    ?>
    


    <div class="back-to-top">
          <a href="#masthead" title="Ir al principio" class="fa fa-angle-up"></a>       
        </div>
    </div>
    <!-- jQuery Library -->
    <script src="../../public/js/jquery.js"></script>
    <!-- Bootstrap js file -->
    <script src="../../public/js/bootstrap.js"></script>
    <!-- Flexslider js file -->
    <script>
      if (!isMobile())
      {
        document.write('<script src="../../public/js/jquery.flexslider.js"><\/script> type="text/javascript" ');
      }
      function isMobile(){
        return (
            (navigator.userAgent.match(/Android/i)) ||
            (navigator.userAgent.match(/webOS/i)) ||
            (navigator.userAgent.match(/iPhone/i)) ||
            (navigator.userAgent.match(/iPod/i)) ||
            (navigator.userAgent.match(/iPad/i)) ||
            (navigator.userAgent.match(/BlackBerry/i))
        );
    }

    </script>
    <!-- Fit video js file -->
    <script type="text/javascript" src="../../public/js/jquery.fitvids.js"></script>
    <!-- Masonry js file live link -->
     <script src="../../public/js/masonry.pkgd.js"></script>
     <script type="text/javascript" src="../../public/js/imagesloaded.pkgd.js"></script>
     <!-- Isotope js file -->
    <script type="text/javascript" src="../../public/js/isotope.js"></script>
    <!-- Template custom js file -->
    <script src="../../public/js/custom.js"></script>
    <!-- Contact form validation -->
    <script src="../../public/validate/jquery.validate.js"></script>

    <script>
    //Agregar cliente
    if (getUrlVars()["clientaddtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se agrego cliente con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientaddfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible agregar cliente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Actualizar cliente
    if (getUrlVars()["clientaupdatetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se Actualizo cliente con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientupdatefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible Actualizar cliente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Delete cliente
    if (getUrlVars()["clientadeletetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se ELIMINO cliente con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientdeletefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible ELIMINAR cliente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Actualizar imagen de clientes
    if (getUrlVars()["img_clients_update_true"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se Actualizo la informacion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["img_clients_update_false"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible Actualizar la informacion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Actualizar imagen de clientes
    if (getUrlVars()["img_clients_delete_true"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se Elimino la informacion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["img_clients_delete_false"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible Eliminar la informacion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar video de clientes
    if (getUrlVars()["clientaddvdotrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se Agrego un nuevo video.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientaddvdofalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible Agregar el nuevo video.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar imagen de clientes
    if (getUrlVars()["clientaddimgtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se Agrego una nueva imagen.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientaddimgfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible Agregar la imagen, intente de nuevo.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["clientaddimgnoupdate"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> Verifique las rutas y permisos de las carpetas publicas.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Enviar mail de clientes
    if (getUrlVars()["sendmailtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se envio el correo a las cuentas indicadas.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["sendmailfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible enviar la informacion por correo.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Enviar mail de interesados en servicios 
    if (getUrlVars()["sendmailserviciotrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se envio el correo con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["sendmailserviciofalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible enviar la informacion por correo, intente de nuevo.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar portada magazine
    if (getUrlVars()["magazineaddtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se agrego la portada correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["magazineaddfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible agregar la portada.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //editar portada magazine
    if (getUrlVars()["magazineupdatetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se edito la portada correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["magazineupdatefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible editar la portada.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Eliminar portada magazine
    if (getUrlVars()["magazinedeletetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se elimino la portada correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["magazinedeletefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible eliminar la portada.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Pago oxxo
    if (getUrlVars()["ref_oxxo"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> SOLO PAGA <strong>$ <?php echo str_replace('MXN',' MXN', $_GET['pay']) ?></strong>, EN EL OXXO MAS CERCANO | <a target='_BLANK' href='<?php echo base_url() . 'all/oxxo_ficha?ref_oxxo='.$_GET['ref_oxxo'].'&pay='.$_GET['pay'].' ' ?>'> ver ficha </a>";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Eliminar usuario
    if (getUrlVars()["userdeletetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se elimino usuario correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["userdeletefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible eliminar este usuario.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Actualizar usuario
    if (getUrlVars()["userupdatetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se actualizo usuario correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["userupdatetrue"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible actualizar este usuario.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar usuario
    if (getUrlVars()["useraddtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se agrego usuario correctamente.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["useraddfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible agregar este usuario.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Errror password
    if (getUrlVars()["loginfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> Contraseña O usuario incorrectos";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar qr
    if (getUrlVars()["qraddtrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se agrego QR con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["qraddfalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible agregar este QR.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Eliminar qr
    if (getUrlVars()["qrtionadeletetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se elimino el codigo QR con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["qrtiondeletefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible eliminar este QR.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Actualizar qr
    if (getUrlVars()["qrtionaupdatetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se actualizo codigo QR con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["qrtionupdatefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible actualizar este QR.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Agregar promocion
    if (getUrlVars()["addpromotrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se agrego promocion con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["addpromofalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible agregar esta promocion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    //Eliminar promocion
    if (getUrlVars()["promotiondeletetrue"])
    {
        var body = "<div class='alert alert-success alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-check'></strong> Se elimino promocion con exito.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    else if (getUrlVars()["promotiondeletefalse"])
    {
        var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
        body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
        body +="<span aria-hidden='true'>&times;</span>";
        body +="</button>";
        body +="<strong><p class='fa fa-exclamation'> </strong> No es posible eliminar esta promocion.";
        body +="</div>";
        document.getElementById("message").innerHTML = body;
    }
    </script>
 </body>
</html>
<script>
$(window).load(function() {
	$('#preloader').fadeOut('slow');
	$('body').css({'overflow':'visible'});
})
</script>