<?php 
      $login = LoginCheckBool();
      error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Link u Projects</title>
    <!-- Custom Favicons -->
    <link rel="icon" type="image/png" href="../../public/images/favicon.png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet"> 
    <!-- Iconic fonts -->
    <link rel="stylesheet" type="text/css" href='../../public/css/font-awesome.min.css'>
    <!-- Bootstrap framework styling -->
    <link href="../../public/css/bootstrap.css" rel="stylesheet">
    <!-- Template main style -->
    <link rel="stylesheet" type="text/css" href="../../public/style.css">
    <!-- Flex slider overwrite styling  -->
    <link rel='stylesheet' id='demo-style-css' href='../../public/css/style.css' type='text/css' media='all'/>
    <!-- Flex slider overwrite styling  -->
    <link rel='stylesheet' href='../../public/css/customgallery.css' type='text/css' media='all'/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  /* preloader */
  #preloader {
        position: fixed;
        top:0; left:0;
        right:0; bottom:0;
        background: #2d2224;
        z-index: 100;
    }
    #loader {
        width: 100px;
        height: 100px;
        position: absolute;
        left:50%; top:50%;
        background: url(../../public/images/loader.svg) no-repeat center 0;
        margin:-50px 0 0 -50px;
    }
  </style>
  <body class="home">
  <div id="preloader">
        <div id="loader"></div>
    </div>
    <div class="global-menu-wrap">
      <div id="global-menu">
        <span class="menu-title show-menu">menu</span>
        <span class="menu-title hide-menu">cerrar</span>
        <span class="icon-bar upper-menu"></span>
        <span class="icon-bar mid-menu"></span>
        <span class="icon-bar bottom-menu"></span>
      </div>
    </div>
    <div class="menu-box-bg"></div>
    <div id="page" class="hfeed site">      
      <header id="masthead" class="site-header">
        <div class="hgroup-wrap">
          <div class="topbar">
            <div class="container">
              <div class="inline-social-icons">
                <ul>
                  
                  <?php 
                  if ($_SERVER["REQUEST_URI"] != '/index.php/all/login')
                  {
                    if ($login)
                    {
                      $salir = '<li><a href="/index.php/All/login_close" class="fa fa-times"> salir</a></li>';
                    }else
                    {
                      $salir = '<li><a href="/index.php/all/login" class="fa fa-user"> Entrar</a></li>';
                    }
                    echo $salir . '
                    <li><a href="https://www.facebook.com/linkuzac/?modal=admin_todo_tour" target="_blank" class="fa fa-facebook-square"></a></li>
                    <li><a href="https://www.youtube.com/channel/UCv72dPE4OO9HZ_JSUVL_HPA?disable_polymer=true" target="_blank" class="fa fa-youtube-play"></a></li>
                    <li><a href="https://www.instagram.com/linku.gestion/?utm_source=ig_profile_share&igshid=1vkm4f8uy46jr" target="_blank" class="fa fa-instagram"></a></li>
                    ';
                  }
                  else
                  {
                    echo '
                    <li><a href="#" target="_blank" class="fa fa-facebook-square"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-twitter-square"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-youtube-play"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-instagram"></a></li>
                    ';
                  }
                  ?>

                </ul>
              </div>
              <div class="search-container">
                    <div class="fa fa-search search-toggle"></div>
                    <div class="search-box">
                      <form class="search-form" action="/index.php/All/view_category" autocomplete="off">
                        <label>
                          <span class="screen-reader-text">Search for:</span>
                          <input type="text" class="search-field" id="search" name="search" value="" placeholder="Texto aqui">
                          <input type="hidden"  value="0" id="id" name="id">
                          <input type="hidden"  value="1" id="pag" name="pag" >
                        </label>
                        <input class="search-submit" type="submit" value="Buscar">
                      </form>
                    </div>
                  </div> 
            </div>
          </div>
          <div class="site-branding">
            <div class="container">
              <h1 class="site-title">
                
                <?php
                  if ($login)
                  {
                    echo '
                    <a href="/index.php/all/clients_gestionar" title="Gestionar clientes" target="_self">
                    <img alt="" src="../../public/images/site-logo1.png">
                    </a>';
                  }else
                  {
                    echo '
                    <a href="/" title="Pagina principal" target="_self">
                    <img alt="" src="../../public/images/site-logo1.png">
                    </a>';
                  }
                ?>
              </h1>
            </div>
          </div> 
            <?php
              if ($login)
              {
                echo'
                <div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation container">
                  <div class="menu-top-menu-container clearfix">
                    <ul>
                      <li class="nav-item"><a href="#" target="_self">Clientes</a>
                      <ul>
                        <li><a href="#" data-toggle="modal" data-target="#addclient">Nuevo cliente</a></li>
                        <li><a href="/index.php/all/clients_gestionar">Gestionar</a></li>
                      </ul>
                    </li>
                      <li><a href="/index.php/all/nuestros_servicios" target="_self">Nuestros servicios</a></li>
                      <li><a href="/index.php/all/contacto" target="_self">Contacto</a></li>
                      <li class="nav-item"><a href="#" target="_self">U. Magazine</a>
                        <ul>
                          <li><a href="/index.php/all/magazine?id_img=0&pag=1" target="_self">Gestionar</a></li>
                          <li><a href="/index.php/all/magazine_sub?pag=1" target="_self">Suscriptores</a></li>
                          <li><a href="/index.php/all/pdf_activos_magazine" target="_self">Reporte activos</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">Categorias</a>
                      '.GetCategoriesLI().'
                      </li>
                      <li class="nav-item"><a href="#" target="_self">Promociones</a>
                        <ul>
                          <li><a href="#" data-toggle="modal" data-target="#addpromo">Nueva promocion</a></li>
                          <li><a href="/index.php/all/promociones" target="_self">Ver promociones</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">'.$this->session->userdata('username').'</a>
                        <ul>
                          <li><a href="#" data-toggle="modal" data-target="#newuser">Nuevo usuario</a></li>
                          <li><a href="/index.php/all/users" target="_self">Gestionar usuarios</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>    
                </nav>
              </div>';
              }else
              {
                echo'
                <div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation container">
                  <div class="menu-top-menu-container clearfix">
                    <ul>
                      <li><a href="" data-toggle="modal" data-target="#exampleModal">Quienes somos</a></li>
                      <li><a href="/index.php/all/nuestros_servicios" target="_self">Nuestros servicios</a></li>
                      <li><a href="/index.php/all/contacto" target="_self">Contacto</a></li>
                      <li><a href="/index.php/all/magazine?id_img=0&pag=1" target="_self">U. Magazine</a></li>
                      <li><a href="/index.php/all/c_zacatecas" target="_self">Conoce Zacatecas</a></li>
                      <li class="nav-item"><a href="#" target="_self">Categorias</a>
                      '.GetCategoriesLI().'
                      </li>
                    </ul>
                  </div>    
                </nav>
              </div>';
              }
            ?>
        </div>
      </header>
      
      
      <?php if ($_SERVER["REQUEST_URI"] == '/' || $_SERVER["REQUEST_URI"] == '/index.php')
      {
        echo '
        <div id="main" class="site-main">
        <div class="featured-slider">
          <div id="bannerflexslider" class="flexslider">
            <ul class="slides">
            <li>
            <a href="">
            <img src="../../public/images/portada2.png" class="attachment-slider size-slider wp-post-image" alt="slider1" /> </a>
            <div class="slider-caption">
            <h2><a href="'.base_url().'all/c_zacatecas">Conoce zacatecas !</a></h2>
            <p>Jerez de García Salinas, La Quemada, Nochistlán, Parque Nacional Sierra de Órganos, Teúl de González Ortega, Pinos, Santuario de Plateros, Sombrerete y mas ! </p><a href="'.base_url().'all/c_zacatecas" target="_self">Conocer ! </a> </div>
            </li>
            <li>
            <a href="#">
            <img src="../../public/images/portada1.png" class="attachment-slider size-slider wp-post-image" alt="slider2" /> </a>
            <div class="slider-caption">
            <h2><a href="'.base_url().'all/c_zacatecas">Conoce zacatecas !</a></h2>
            <p>Jerez de García Salinas, La Quemada, Nochistlán, Parque Nacional Sierra de Órganos, Teúl de González Ortega, Pinos, Santuario de Plateros, Sombrerete y mas ! </p><a href="'.base_url().'all/c_zacatecas" target="_self">Conocer ! </a> </div>
            </li>
            </ul>
          </div>
        </div>
        ';
      }else
      {
        echo '<br>
        ';
      } ?>
      <script>
      function getUrlVars() {
          var vars = {};
          var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = value.replace(/%20/g, " ");
          });
          return vars;
        }
      </script>
      <div class="container">
      <div id="message"></div>