$=jQuery
jQuery(document).ready(function () {

  /* Has children menu add class */
    $('.nav-item:has(ul)').prepend('<span class="nav-click" />');
  

  // Video fit
          $(".post-featured-image").fitVids();

          /* search toggle */

        $(".search-toggle").click(function(){
        $(".search-box").toggle("slow");
     
        if ( !$(".search-toggle").hasClass("search-active")){
           $(".search-toggle").addClass("search-active");

        }
        else{
        $(".search-toggle").removeClass("search-active");
        }
        
    });

        

         /* back-to-top button*/

     $('.back-to-top').hide();
     $('.back-to-top').on("click",function(e) {
     e.preventDefault();
     $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    
    $(window).scroll(function(){
      var scrollheight =400;
      if( $(window).scrollTop() > scrollheight ) {
           $('.back-to-top').fadeIn();

          }
        else {
              $('.back-to-top').fadeOut();
             }
     });

    /*    responsive menu    */
          
        $('#global-menu').on("click",function(e) {
        e.preventDefault();
        $('body').toggleClass('global-menu-active');
        });

        $("#global-menu").click(function () {
        $(".upper-menu").toggleClass("upper-animate");
        $(".mid-menu").toggleClass("mid-animate");
        $(".bottom-menu").toggleClass("bottom-animate");
    });


          $('.menu-box-bg').on({
             click: function (){
             closeMenu();
             }  
           });
          $
          ('.menu-top-menu-container ul').on({
             click: function (){
             closeMenu();
             }  
           });


           function closeMenu(){
             $('body').removeClass('global-menu-active');
             $('menu-top-menu-container ul').removeClass('global-menu-active');
           }


           $(".menu-box-bg").click(function () {
               $(".upper-menu").toggleClass("upper-animate");
               $(".mid-menu").toggleClass("mid-animate");
               $(".bottom-menu").toggleClass("bottom-animate");
           });
           $(".menu-top-menu-container ul").click(function () {
               $(".upper-menu").toggleClass("upper-animate");
               $(".mid-menu").toggleClass("mid-animate");
               $(".bottom-menu").toggleClass("bottom-animate");
           });

           // slider script
          jQuery('#bannerflexslider, #flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed: 600,
            randomize: false,
            prevText: "",
            nextText: "",
            pauseOnHover: true
          });


// Isotope
  var $container = $('.isotope').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows',
    getSortData: {
      name: '.name',
      symbol: '.symbol',
      number: '.number parseInt',
      category: '[data-category]',
      weight: function( itemElem ) {
        var weight = $( itemElem ).find('.weight').text();
        return parseFloat( weight.replace( /[\(\)]/g, '') );
      }
    }
  });
  // filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
  });

  // bind sort button click
  $('#sorts').on( 'click', 'button', function() {
    var sortByValue = $(this).attr('data-sort-by');
    $container.isotope({ sortBy: sortByValue });
  });
  
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

          


        
      });
