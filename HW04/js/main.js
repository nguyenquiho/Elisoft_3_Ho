// A $( document ).ready() block.
$( document ).ready(function() {
    width = $( window ).width();
    if(width <= 751){
        $('.navigation-menu').addClass('is-mobile');
        $('.navigation-menu').removeClass('is-desktop');
        // $('.navigation-menu.is-mobile').show();
        $('.navigation-menu.is-mobile .main-menu li').hide();
        $('.navigation-menu.is-mobile .main-menu > li:first-child').css('display','none');
        //$('.navigation-menu.is-mobile .main-menu li #btn-menu-bar').show();
        $('.navigation-menu.is-mobile #btn-menu-bar').click(function(){
            if($(this).hasClass('close-bar')){
                $('.navigation-menu.is-mobile .main-menu li').toggle();
                $(this).removeClass('close-bar');
                $('.is-mobile #btn-menu-bar').css({'position':'static'});
                $('.is-mobile #btn-menu-bar i').addClass('fa-bars');
                $('.is-mobile #btn-menu-bar i').removeClass('fa-times');
                $('.make-bg').css('display','none');
            }
            else{
                $(this).addClass('close-bar');
                $('.is-mobile #btn-menu-bar').css({'position':'absolute','right':'2px','top':'2px'});
                $('.is-mobile #btn-menu-bar i').removeClass('fa-bars');
                $('.is-mobile #btn-menu-bar i').addClass('fa-times');
                $('.is-mobile #btn-menu-bar i').css('font-size','25px');
                $('.navigation-menu.is-mobile .main-menu li').toggle();
                $(this).show();
                $('.make-bg').css('display','block');
            }
            
        });

        $('.make-bg').click(function(){
            $('.navigation-menu.is-mobile .main-menu li').toggle();
            $('.is-mobile #btn-menu-bar').removeClass('close-bar');
            $('.is-mobile #btn-menu-bar').css({'position':'static'});
            $('.is-mobile #btn-menu-bar i').addClass('fa-bars');
            $('.is-mobile #btn-menu-bar i').removeClass('fa-times');
            $('.make-bg').css('display','none');
        });

        $('.navigation-menu.is-mobile li#toggle-product').click(function(){
            $('.navigation-menu.is-mobile .main-menu li > .sub-main-menu').toggle('slow');
            // $(this).show();
            //alert("abc");
        });
        //$('.navigation-menu.is-mobile #toggle-mobile').click(function(){
            //$('.navigation-menu.is-mobile .sub-menu').toggle('slow');
            // $(this).show();
            //alert("abc");
        //});
    }
});