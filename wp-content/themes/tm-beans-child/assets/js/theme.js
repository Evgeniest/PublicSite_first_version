

(function ($) {
    $(document).ready(function () {
        // Header button on scroll
        /*$('.tm-header').addClass('header-button');*/
        $('.custom-header-image img').detach().appendTo('.header-custom-logo');
        $('.colored-text').detach().insertBefore('.tm-hero-content');
        $link = $('.getquote-link').attr('data-value');
        $('.uk-button.get-quote').attr('href', $link);

        $(window).on('scroll', function(){
            var scrollPosition = $(this).scrollTop();
            if(scrollPosition >= 410) {
                if (!$('.tm-header').hasClass('header-button') && !$('body').hasClass('.landing-logo')) {
                    $('.tm-header').addClass('header-button');
                    $dh = $(document).width();
                    if ($(document).width() < 768) {
                        $right_items = 131;
                        if ($('body').hasClass('page-template-builder-page')) {
                            // if ($('body').hasClass('home'))
                                $right_items = 131;
                            // else
                            //     $right_items = 61;
                        }
                        $fw = $dh - $right_items;
                        $('.tm-header.header-button .uk-button').css('width', $fw + 'px');
                    } else {
                        $('.tm-header.header-button .uk-button').css('width', '220px');
                    }
                    $('.tm-header').css('left', '0');
                }
            }else{
                $('.tm-header').removeClass('header-button');
            }
        });
        $('.slide-menu-button').click(function(){$('.slider-primary-mobile-menu').slideToggle()});

        $('a.close-btn').click(function(){
            window.UIkit.offcanvas.hide();
        });

        $('.slide-menu-button').click(function(){
            $('.overlay').css('height', $(document).height());
            $(this).toggleClass('active');
            $('div.header-search-form').toggleClass('search-hidden');
            $('.overlay').toggleClass('active');

        });

       


        $(window).resize(function(){
            $('.overlay').css('height', $(document).height());
            $dh = $(document).width();
            if($(document).width()<768) {
                $right_items = 131;
                if($('body').hasClass('page-template-builder-page')){
                    // if($('body').hasClass('home'))
                        $right_items = 131;
                    // else
                    //     $right_items = 61;
                }
                $fw = $dh - $right_items;
                console.log($dh + ' - ' + $right_items + ' - ' + $fw);
                $('.tm-header.header-button .uk-button').css('width', $fw + 'px');
                $('.tm-header').css('left', '0');
            }
        });
        $(window).load(function(){

        })
        $('.spu-box').click(function(event) {
            if (event.target.className === 'done-btn') {
                var id = $(this).attr('data-box-id');
                window.SPU.hide(id);
            }

        })
        // search field on focus
        $('.search-field').on('focus', function(){
            $(this).data('placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', "");
        }).on('blur', function(){
            $(this).attr('placeholder', $(this).data('placeholder'));
        });

        $('.search-erase').click(function(){
             $('.search-field').focus();   
             $('.search-field').val("");
        });


       


        // menu-mobile_header
        $('#menu-mobile_header').removeClass('uk-nav-parent-icon');

// stop the scroll on the body when the menu is open
        $( '.slide-menu-button' ).click(function() {
            
                 if( $('button.slide-menu-button').hasClass('active'))
                {
                    $('body').css('overflow-y','hidden');
                }
               else{
                     $('body').css('overflow-y','visible');
               }
        });

        var subscribeDiv = $(".subscribe-mail");
        var lastScrollTop = 0;
        $(window).scroll(function() {
            var st = $(this).scrollTop();
            if(Math.abs(lastScrollTop - st) <= 5)
                return;
            if (st > lastScrollTop){
                subscribeDiv.removeClass('sticky');
            } else {
                if(st + $(window).height() < $(document).height()) {
                    subscribeDiv.addClass('sticky');
                }
            }
        
            lastScrollTop = st;
        });

        // when menu-mobile_header is activ the search is hidden
        $('.header-search-form>.search-title').on('click', function(){
            $('div.search-field-wrapper').toggleClass('search-show');
           
        });

       // add flex-direction:column to primary menu if the sub-nav does not contain menu-item-has-children in it
       
       $('#menu-menu-1').find('.sub-menu').each(function() {
           
            if($( this ).children( '.menu-item-has-children' ).length <1){
                $(this).css({'flex-direction':'column'});
            }
        });

        // add attribute to primary menu items
        
        $('#menu-menu-1').children('.menu-item').each(function(){
           
            $(this).attr('data-uk-dropdown', '{mode:\'click\'}' );
        });
       

        // when the select box in the landing page is open, the arrow direction needs to change
        if( navigator.userAgent.indexOf('Firefox') == -1 ) {
            $('.mc4wp-form-fields select').click(function() {
                $(this).parent().toggleClass('open');
            });
        }
    });

    $(document).ready(function(){
      doResize();
      $(window).on('resize', doResize);
      $(".responsive-tabs__list__item" ).on( "click", function() {
        doResize();
      });
    });
})(jQuery);

function doResize() {
  jQuery(".post-content").dotdotdot({
    ellipsis: '...',
    height: Math.max( 80, jQuery(".post-content").innerHeight() - 30 )
  });
}