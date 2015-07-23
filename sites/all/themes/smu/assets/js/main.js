jQuery(document).ready(function ($) {

    //Go to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#go-to-top').css({
                bottom: "25px"
            });
        } else {
            $('#go-to-top').css({
                bottom: "-100px"
            });
        }
    });

    var toggle = false;
    $('#global-nav-tab').click(function() {
        $('#global-nav-content').slideToggle();
        if (toggle==false) {
            $(this).toggleClass("global-nav-expanded").text("Collapse");
        } else {
            $(this).toggleClass("global-nav-expanded").text("Main menu");
        }
        toggle = !toggle;
    });

    /*scroll to top*/
    $('.back-to-top').unwrap().wrap('<div class="back-to-top-wrap"></div>');
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: '0px'
        }, 800);
        return false;
    });

    /*menu scroll to section*/
    if(window.location.hash) {
        setTimeout(function(){
            window.scroll(0,0);
        },1);
    }

    $(window).load(function(e){
        var url = window.location,
            id = url.hash;
        scrollTo(id);
    });

    $('.btn-scroll').click(function(e) {
        e.preventDefault();
        var id = this.hash;
        scrollTo(id);
    });

    function scrollTo(id) {
        if($(id).length) {
            var n = $(id).offset().top-10;
            var r = Math.round(1e3+n/15);
            $("html, body").animate({scrollTop:n},r);
        }
    }
});