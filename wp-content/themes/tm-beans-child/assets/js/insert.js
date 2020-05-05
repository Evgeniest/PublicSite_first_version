(function ($) {
    $(document).ready(function () {

        //insert elements
        //wrap 6 first elements on blog
        $('.blog .post-wrap:lt(6)').wrapAll('<div class="six-post-wrap uk-grid"></div>');
        //wrap lasts elements on blog
        $('.blog .tm-content > .post-wrap:lt(9)').wrapAll('<div class="lasts-post-wrap uk-grid"></div>');
        //insert quote after 6 firsts blog posts
        /*$('.blog .six-post-wrap').append( '<div class="insert-element"><a class="uk-button uk-align-center" href="">get' +
            ' quote</a></div>');*/
        $link = $('.getquote-link').attr('data-value');
        $('<div class="insert-element"><a class="uk-button uk-align-center" href="'+$link+'">get quote</a></div>').insertAfter('.six-post-wrap.uk-grid');
        //wrap 6 first elements on category
        $('.category .post-wrap:lt(6)').wrapAll('<div class="six-post-wrap uk-grid"></div>');
        //insert subscribe after 6 posts category
        /*$('.category .six-post-wrap').append( '<div class="insert-element"><h3>Subscribe</h3>'+
            '<form action="">'+
            '<input type="text" class="subscribe" name="subscribe">'+
            '</form></div>');*/



        //wrap 3 next elements on category
        $('.category .tm-content > .post-wrap:lt(3)').wrapAll('<div class="three-post-wrap uk-grid"></div>');
        //insert quote after 3 next cat posts
        /*$('.category .three-post-wrap').append( '<div class="insert-element"><a class="uk-button" href="">get quote</a></div>');*/

        $('<div class="insert-element"><a class="uk-button" href="'+$link+'">Get quote</a></div>').insertAfter('.category .three-post-wrap');
        //wrap 6 last elements on category
        $('.category .tm-content > .post-wrap:lt(6)').wrapAll('<div class="lasts-post-category-wrap uk-grid"></div>');

        $subscribe = '<div class="insert-element"><h3>Subscribe</h3>'+
            '<form action="">'+
            '<input type="text" class="subscribe" name="subscribe">'+
            '</form></div>';

        //$subscribe.insertAfter('.category .six-post-wrap');

        $('.category .subscribe-form').detach().insertAfter('.category .six-post-wrap');

        $('.single-post .ssba-wrap').insertAfter('.post-tags');
        $('.ssba-wrap').not(':last').remove();
    });
})(jQuery);


// Anchor links sticky menu fix
function offsetAnchor() {
    if (location.hash.length !== 0) {
        window.scrollTo(window.scrollX, window.scrollY - 80);
    }
}
// Captures click events of all a elements with href starting with #
jQuery(document).on('click', 'a[href^="#"]', function(event) {
    window.setTimeout(function() {
        offsetAnchor();
    }, 0);
});
// Set the offset when entering page with hash present in the url
window.setTimeout(offsetAnchor, 0);