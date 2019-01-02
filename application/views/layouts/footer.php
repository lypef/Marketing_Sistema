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
                      <a href="index.html" target="_self"><img alt="" src="../../public/images/footer-logo.png"></a>
                    </h1>  
                  </div>
                  <div class="textwidget">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  <div class="inline-social-icons">
                    <ul>
                      <li><a href="#" target="_blank" class="fa fa-facebook-square"></a></li>
                      <li><a href="#" target="_blank" class="fa fa-twitter-square"></a></li>
                      <li><a href="#" target="_blank" class="fa fa-youtube-play"></a></li>
                      <li><a href="#" target="_blank" class="fa fa-linkedin-square"></a></li>
                      <li><a href="#" target="_blank" class="fa fa-instagram"></a></li>
                      <li><a href="#" target="_blank" class="fa fa-pinterest-square"></a></li>
                    </ul>
                  </div>
                </aside>
              </div>
              <div class="col-sm-4">
                <aside class="widget">
                  <h2 class="widget-title">Categories</h2>
                  <ul>
                    <li><a href="#" target="_self">Psd Design</a><span>(25)</span></li>
                    <li><a href="#" target="_self">Static HTML</a><span>(25)</span></li>
                    <li><a href="#" target="_self">Responsive Websites</a><span>(25)</span></li>
                    <li><a href="#" target="_self">Wordpress theme</a><span>(22)</span></li>
                    <li><a href="#" target="_self">Wordpress Plugins</a><span>(18)</span></li>
                  </ul>
                </aside>
              </div>
              <div class="col-sm-4">
                <aside class="widget widget-links">
                  <h2 class="widget-title">Like Us on Facebook</h2>
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fthemeidol&tabs=timeline&width=340&height=250&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=1349216208421887" width="340" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </aside>
              </div>
            </div>
          </div> 
        </div>
        <div class="copy-right">
          <div class="container">
            <span>© 2019 <a target="_blank" href="http://www.cyberchoapas.com">www.cyberchoapas.com</a></span>
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

    <div class="back-to-top">
          <a href="#masthead" title="Ir al principio" class="fa fa-angle-up"></a>       
        </div>
    </div>
    <!-- jQuery Library -->
    <script src="../../public/js/jquery.js"></script>
    <!-- Bootstrap js file -->
    <script src="../../public/js/bootstrap.js"></script>
    <!-- Flexslider js file -->
    <script src="../../public/js/jquery.flexslider.js" type="text/javascript"></script>
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
        body +="<strong><p class='fa fa-check'></strong> Se envio el correo a nuestras cuentas, a la brevedad le atendemos.";
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
    </script>
 </body>
</html>
<script>
$(window).load(function() {
	$('#preloader').fadeOut('slow');
	$('body').css({'overflow':'visible'});
})
</script>