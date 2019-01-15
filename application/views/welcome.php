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
                      <a href="'.base_url().'all/view_category?id='.$item->id.'&pag=1">
                        <span><strong>'.$item->nombre.'</strong></span><br><span><strong>'.$item->name.'</strong></span><br>
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
                
                <div class="row">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Los Angeles" style="width:100%;">
                      <div class="carousel-caption">
                        <h2>Los Angeles</h2>
                        <p>LA is always so much fun!</p>
                      </div>
                    </div>

                    <div class="item">
                      <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Chicago" style="width:100%;">
                      <div class="carousel-caption">
                        <h2>Los Angeles</h2>
                        <p>LA is always so much fun!</p>
                      </div>
                    </div>
                  
                    <div class="item">
                      <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="New york" style="width:100%;">
                      <div class="carousel-caption">
                        <h2>Los Angeles</h2>
                        <p>LA is always so much fun!</p>
                      </div>
                    </div>
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
              <aside class="widget widget_newsletter">
                <h2 class="widget-title">news letter</h2>
                <p>Enter  your Email below if you want to receive our newsletter.</p>
                <form class="search-form">
                  <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input class="search-field" type="search" placeholder="Email address" name="search">
                  </label>
                  <input class="search-submit" type="submit" value="subscribe">
                </form>
              </aside>
              <aside class="widget widget_recent_entries">
                <h2 class="widget-title">latest news</h2>
                <ul>
                  <li>
                    <div class="post-content-wrap">
                      <div class="entry-container">
                        <h2 class="entry-title"><a href="#" target="_self">Best Blog theme in the world :Blog Idol</a></h2>
                        <div class="entry-meta clearfix">
                          <div class="fa fa-clock-o">
                            <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                          </div>
                          <div class="fa fa-comments-o">
                            <a href="#">3</a>
                          </div>
                        </div>
                      </div>
                      <figure class="post-featured-image">
                        <img alt="" src="public/images/post-grid1.jpg">
                      </figure>
                    </div>
                  </li>
                  <li>
                    <div class="post-content-wrap">
                      <div class="entry-container">
                        <h2 class="entry-title"><a href="#" target="_self">Best Blog theme in the world :Blog Idol</a></h2>
                        <div class="entry-meta clearfix">
                          <div class="fa fa-clock-o">
                            <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                          </div>
                          <div class="fa fa-comments-o">
                            <a href="#">3</a>
                          </div>
                        </div>
                      </div>
                      <figure class="post-featured-image">
                        <img alt="" src="public/images/post-grid2.jpg">
                      </figure>
                    </div>
                  </li>
                  <li>
                    <div class="post-content-wrap">
                      <div class="entry-container">
                        <h2 class="entry-title"><a href="#" target="_self">Best Blog theme in the world :Blog Idol</a></h2>
                        <div class="entry-meta clearfix">
                          <div class="fa fa-clock-o">
                            <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                          </div>
                          <div class="fa fa-comments-o">
                            <a href="#">3</a>
                          </div>
                        </div>
                      </div>
                      <figure class="post-featured-image">
                        <img alt="" src="public/images/post-grid3.jpg">
                      </figure>
                    </div>
                  </li>
                  <li>
                    <div class="post-content-wrap">
                      <div class="entry-container">
                        <h2 class="entry-title"><a href="#" target="_self">Best Blog theme in the world :Blog Idol</a></h2>
                        <div class="entry-meta clearfix">
                          <div class="fa fa-clock-o">
                            <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                          </div>
                          <div class="fa fa-comments-o">
                            <a href="#">3</a>
                          </div>
                        </div>
                      </div>
                      <figure class="post-featured-image">
                        <img alt="" src="public/images/post-grid2.jpg">
                      </figure>
                    </div>
                  </li>
                </ul>
              </aside>
              <aside class="widget">
                <h2 class="widget-title">Categories</h2>
                <ul>
                  <li><a href="#" target="_self">Blog</a><span>(25)</span></li>
                  <li><a href="#" target="_self">Himalaya</a><span>(30)</span></li>
                  <li><a href="#" target="_self">Nepal</a><span>(11)</span></li>
                  <li><a href="#" target="_self">Wordpress theme</a><span>(22)</span></li>
                  <li><a href="#" target="_self">Wordpress Plugins</a><span>(18)</span></li>
                </ul>
              </aside>
              <aside class="widget widget_tag_cloud clearfix">
                <h2 class="widget-title">Tag</h2>
                <ul>
                  <li><a href="#" target="_self">wordpress</a></li>
                  <li><a href="#" target="_self">theme</a></li>
                  <li><a href="#" target="_self">theme idol</a></li>
                  <li><a href="#" target="_self">Wocommerce Theme</a></li>
                  <li><a href="#" target="_self">blog</a></li>
                  <li><a href="#" target="_self">blog idol</a></li>
                  <li><a href="#" target="_self">HTML</a></li>
                  <li><a href="#" target="_self">mount everest</a></li>
                </ul>
              </aside>
            </div>
          </div>
        </div>
        <div class="hero-section">
          <div class="container">
            <div class="blog-post cat-tech">
              <h2 class="idol-title">Technology</h2>
              <div class="row">
                <div class="col-sm-12">
                  <div class="blog-two">
                    <article class="post">
                      <figure class="post-featured-image">
                        <a href="#" target="_self">
                          <img alt="" src="public/images/big-landscape2.jpg">
                        </a>
                        <div class="entery-header">
                          <div class="entry-meta clearfix">
                            <div class="fa fa-clock-o">
                              <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                            </div>
                            <div class="fa fa-comments-o">
                              <a href="#">3</a>
                            </div>
                          </div>
                          <div class="entry-meta clearfix">
                            <div class="fa fa-heart-o">
                              <a href="#">5</a>
                            </div>
                            <div class="fa fa-eye">
                              <a href="#">15 </a>
                            </div>
                            <div class="fa fa-share-alt">
                              <a href="#"> </a>
                            </div>
                          </div>
                        </div>
                      </figure>
                      <div class="entry-container">
                        <header class="entry-header">
                          <div class="entry-meta clearfix">
                            <span class="cat-links">
                              <a target="_self" href="#">technology</a>
                            </span>
                            <span class="cat-links">
                              <a target="_self" href="#">Trend 2016</a>
                            </span>
                          </div>
                          <h3 class="entry-title">
                            <a href="#" target="_self">Best Standard blog post</a>
                          </h3>
                        </header>
                        <div class="entry-summary">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip...</p>
                          <p><a href="#" target="_self" class="read-more-button">read more</a></p>
                        </div>
                      </div>
                    </article>
                    <article class="post">
                      <figure class="post-featured-image">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/smQ6PEtkexs" frameborder="0" allowfullscreen></iframe>
                        <div class="entery-header">
                          <div class="entry-meta clearfix">
                            <div class="fa fa-clock-o">
                              <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                            </div>
                            <div class="fa fa-comments-o">
                              <a href="#">3</a>
                            </div>
                          </div>
                          <div class="entry-meta clearfix">
                            <div class="fa fa-heart-o">
                              <a href="#">5</a>
                            </div>
                            <div class="fa fa-eye">
                              <a href="#">15 </a>
                            </div>
                            <div class="fa fa-share-alt">
                              <a href="#"> </a>
                            </div>
                          </div>
                        </div>
                      </figure>
                      <div class="entry-container">
                        <header class="entry-header">
                          <div class="entry-meta clearfix">
                            <span class="cat-links">
                              <a target="_self" href="#">technology</a>
                            </span>
                            <span class="cat-links">
                              <a target="_self" href="#">Trend 2017</a>
                            </span>
                          </div>
                          <h3 class="entry-title">
                            <a href="#" target="_self">Best Standard blog post</a>
                          </h3>
                        </header>
                        <div class="entry-summary">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip...</p>
                          <p><a href="#" target="_self" class="read-more-button">read more</a></p>
                        </div>
                      </div>
                    </article>
                    <article class="post">
                      <figure class="post-featured-image">
                        <iframe src="https://player.vimeo.com/video/72878860" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <div class="entery-header">
                          <div class="entry-meta clearfix">
                            <div class="fa fa-clock-o">
                              <time class="entry-date" datetime="2016-01-19T08:10:05+00:00">July 3, 2016</time>
                            </div>
                            <div class="fa fa-comments-o">
                              <a href="#">3</a>
                            </div>
                          </div>
                          <div class="entry-meta clearfix">
                            <div class="fa fa-heart-o">
                              <a href="#">5</a>
                            </div>
                            <div class="fa fa-eye">
                              <a href="#">15 </a>
                            </div>
                            <div class="fa fa-share-alt">
                              <a href="#"> </a>
                            </div>
                          </div>
                        </div>
                      </figure>
                      <div class="entry-container">
                        <header class="entry-header">
                          <div class="entry-meta clearfix">
                            <span class="cat-links">
                              <a target="_self" href="#">technology</a>
                            </span>
                            <span class="cat-links">
                              <a target="_self" href="#">Trend 2017</a>
                            </span>
                          </div>
                          <h3 class="entry-title">
                            <a href="#" target="_self">Best Standard blog post</a>
                          </h3>
                        </header>
                        <div class="entry-summary">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip...</p>
                          <p><a href="#" target="_self" class="read-more-button">read more</a></p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>