<?php error_reporting(0); ?>
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="home">

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
                    if ($this->session->userdata('username'))
                    {
                      $salir = '<li><a href="/index.php/All/login_close" class="fa fa-times"> salir</a></li>';
                    }else
                    {
                      $salir = '<li><a href="/index.php/all/login" class="fa fa-user"> Entrar</a></li>';
                    }
                    echo $salir . '
                    <li><a href="#" target="_blank" class="fa fa-facebook-square"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-twitter-square"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-youtube-play"></a></li>
                    <li><a href="#" target="_blank" class="fa fa-instagram"></a></li>
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
                      <form class="search-form">
                        <label>
                          <span class="screen-reader-text">Search for:</span>
                          <input type="text" class="search-field" value="" placeholder="Texto aqui">
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
                  if ($this->session->userdata('username'))
                  {
                    echo '
                    <a href="manager" title="Manager" target="_self">
                    <img alt="" src="../../public/images/site-logo0.png">
                    </a>';
                  }else
                  {
                    echo '
                    <a href="/" title="Pagina principal" target="_self">
                    <img alt="" src="../../public/images/site-logo0.png">
                    </a>';
                  }
                ?>
              </h1>
            </div>
          </div> 
            <?php
              if ($this->session->userdata('username'))
              {
                echo'
                <div id="navbar" class="navbar">
                <nav id="site-navigation" class="navigation main-navigation container">
                  <div class="menu-top-menu-container clearfix">
                    <ul>
                      <li class="nav-item"><a href="#" target="_self">Clientes</a>
                      <ul>
                        <li><a href="#" data-toggle="modal" data-target="#addclient">Nuevo cliente</a></li>
                        <li><a href="topmap-contact.html" target="_self">Gestionar</a></li>
                      </ul>
                    </li>
                      <li><a href="/index.php/all/nuestros_servicios" target="_self">Nuestros servicios</a></li>
                      <li><a href="/index.php/all/contacto" target="_self">Contacto</a></li>
                      <li><a href="/index.php/all/magazine" target="_self">U. Magazine</a></li>
                      <li class="nav-item"><a href="#" target="_self">Categorias</a>
                      '.GetCategoriesLI().'
                      </li>
                      <li class="nav-item"><a href="#" target="_self">'.$this->session->userdata('username').'</a>
                        <ul>
                          <li><a href="/index.php/All/login_close" >Cerrar session</a></li>
                          <li><a href="topmap-contact.html" target="_self">Editar</a></li>
                          <li><a href="bottommap-contact.html" target="_self">Gestionar usuarios</a></li>
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
                      <li><a href="/index.php/all/magazine" target="_self">U. Magazine</a></li>
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
            <img src="../../public/images/slider1.jpg" class="attachment-slider size-slider wp-post-image" alt="slider1" /> </a>
            <div class="slider-caption">
            <h2><a href="category.html">My Journey was full of mystrious.</a></h2>
            <p>Diam 1989 wisi quam lorem vestibulum nec nibh, sollicitudin volutpat at libero litora, non adipiscin...</p><a href="category.html" target="_self">Read More</a> </div>
            </li>
            <li>
            <a href="#">
            <img src="../../public/images/slider2.jpg" class="attachment-slider size-slider wp-post-image" alt="slider2" /> </a>
            <div class="slider-caption">
            <h2><a href="category.html">Generation of the Technology</a></h2>
            <p>Diam wisi quam lorem vestibulum nec nibh, sollicitudin volutpat at libero litora, non adipiscing. Nu...</p><a href="category.html" target="_self">Read More</a> </div>
            </li>
            <li>
            <a href="#">
            <img src="../../public/images/slider3.jpg" class="attachment-slider size-slider wp-post-image" alt="slider3" /> </a>
            <div class="slider-caption">
            <h2><a href="category.html">Games for health and nation.</a></h2>
            <p>Diam wisi quam lorem vestibulum nec nibh, sollicitudin volutpat at libero litora, non adipiscing. Nu...</p><a href="category.html" target="_self">Read More</a> </div>
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