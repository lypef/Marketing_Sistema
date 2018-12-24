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
          El impulso de nuestra empresa está basado en una filosofía empresarial cuyo deseo principal es atraer y satisfacer la demanda de los consumidores, generando consistentemente valor económico para los accionistas, así como un mayor desarrollo social.
          <br><br>
          En cada una de nuestras distintas etapas históricas hemos partido de un principio fundamental: el respeto a la dignidad humana está por encima de cualquier consideración económica.
          <br><br>
          A lo largo de más de 127 años, nos hemos diversificado y participamos en los mercados mundiales de distintas formas.
          <br><br>
          Creamos Coca-Cola FEMSA, el embotellador público más grande de productos Coca-Cola en el mundo, con presencia en 10 países de América Latina.
          <br><br>Nos convertimos en el segundo accionista más importante de Heineken, una de las cerveceras líderes en el mundo con presencia en más de 70 países, con una participación accionaria de 14.8%.
          <br><br>Desarrollamos FEMSA Comercio, que comprende una División Proximidad que opera OXXO, una cadena de tiendas de formato pequeño; una División Salud que incluye farmacias y operaciones relacionadas; y una División Combustibles que opera la cadena de estaciones de servicio OXXO GAS.
          <br><br>Establecimos FEMSA Negocios Estratégicos, conjunto de empresas conformado por Solistica, Imbera y PTM®, que ofrece servicios de logística, soluciones de refrigeración en el punto de venta y soluciones en plásticos a las empresas FEMSA y a clientes externos.
          <br><br>Actualmente, operamos en Argentina, Brasil, Chile, Colombia, Costa Rica, Guatemala, México, Nicaragua, Panamá, Uruguay y Venezuela, comercializando marcas reconocidas de refrescos, jugos, agua embotellada y bebidas energizantes como Coca-Cola, Sprite, Ciel, AdeS, Powerade y andatti, atendiendo a más de 396 millones de consumidores.
          <br><br><br><br>Esta es nuestra estructura corporativa
          <center>
          <img src="https://www.femsa.com/sites/default/files/Estructura_corporativa_FEMSA_0.png" alt="">
          </center>
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
    </script>
 </body>
</html>