
$(document).ready(function(){
    $('.owl-one').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:1
            }
        }
    })
})
setInterval(function() {
    $('.owl-next').click();
    }, 3000);


$(document).ready(function(){
    var owl = $('.owl-two');
    owl.owlCarousel({
        items:6,
        loop:true,
        margin:10,
        autoplay:false,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
    });
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })
})



    $(document).ready(function() {
        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('.backtop').fadeIn();
            }else{
                $('.backtop').fadeOut();
            }
        });
        $('.backtop').click(function(){
            $('html,body').animate({
                scrollTop: 0 }, 1000);
        })
    })

