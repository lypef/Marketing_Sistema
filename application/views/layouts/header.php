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
                      $salir = '<li><a href="/index.php/all/login" class="fa fa-user"> login</a></li>';
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
                      <li class="current-menu-item"><a href="manager" target="_self">Home</a>
                      </li>
                      <li><a href="categories.html" target="_self">Nature</a></li>
                      <li><a href="#" target="_self">Technology</a></li>
                      <li><a href="#" target="_self">Games</a></li>
                      <li class="nav-item"><a href="#" target="_self">Post Styles</a>
                        <ul>
                          <li><a href="single.html" target="_self">Image Post</a></li>
                          <li><a href="video-post.html" target="_self">Video Post</a></li>
                          <li><a href="slider-post.html" target="_self">Slider Post</a></li>
                          <li><a href="fullwidth-post.html" target="_self">Full Width Post</a></li>
                          <li><a href="error.html" target="_self">404 Error</a></li>
                          <li><a href="search.html" target="_self">Search Result</a></li>
                          <li><a href="author.html" target="_self">Author</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">gallery</a>
                        <ul>
                          <li><a href="gallery.html" target="_self">gallery 1</a></li>
                          <li><a href="gallery-filter.html" target="_self">gallery 2</a></li>
                          <li><a href="gallery-pint.html" target="_self">gallery 3</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">'.$this->session->userdata('username').'</a>
                        <ul>
                          <li><a href="/index.php/All/login_close" >Cerrar session</a></li>
                          <li><a href="topmap-contact.html" target="_self">Contact version 2</a></li>
                          <li><a href="bottommap-contact.html" target="_self">Contact version 3</a></li>
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
                      <li class="current-menu-item"><a href="/" target="_self">Home</a>
                      </li>
                      <li><a href="categories.html" target="_self">Nature</a></li>
                      <li><a href="#" target="_self">Technology</a></li>
                      <li><a href="#" target="_self">Games</a></li>
                      <li class="nav-item"><a href="#" target="_self">Post Styles</a>
                        <ul>
                          <li><a href="single.html" target="_self">Image Post</a></li>
                          <li><a href="video-post.html" target="_self">Video Post</a></li>
                          <li><a href="slider-post.html" target="_self">Slider Post</a></li>
                          <li><a href="fullwidth-post.html" target="_self">Full Width Post</a></li>
                          <li><a href="error.html" target="_self">404 Error</a></li>
                          <li><a href="search.html" target="_self">Search Result</a></li>
                          <li><a href="author.html" target="_self">Author</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">gallery</a>
                        <ul>
                          <li><a href="gallery.html" target="_self">gallery 1</a></li>
                          <li><a href="gallery-filter.html" target="_self">gallery 2</a></li>
                          <li><a href="gallery-pint.html" target="_self">gallery 3</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" target="_self">Contact</a>
                        <ul>
                          <li><a href="/index.php/all/login" target="_self">Iniciar session</a></li>
                          <li><a href="topmap-contact.html" target="_self">Contact version 2</a></li>
                          <li><a href="bottommap-contact.html" target="_self">Contact version 3</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>    
                </nav>
              </div>';
              }
            ?>
        </div>
      </header>
      
      <?php if ($_SERVER["REQUEST_URI"] != '/index.php/all/login')
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
      } ?>

      <div class="container">