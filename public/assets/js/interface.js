$(function(){
    // menu deco
    $('.decoMenu').click(function(){
        $('.decoSubmenu').toggle();
    });


    // navTopBar
    var owl = $("#owl-demo");

    owl.owlCarousel({
        items : 6, //10 items above 1000px browser width
        itemsDesktop : [1000,5], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,6], // betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination:false
    });

    // Custom Navigation Events
    $(".next").click(function(){
      owl.trigger('owl.next');
    })
    $(".prev").click(function(){
      owl.trigger('owl.prev');
    })
});
