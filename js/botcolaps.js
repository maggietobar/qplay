   var $;
   
    $(document).ready(function () {
       $(".navbar-toggle").click(function () {
          $(this).toggleClass("click");
       });
    });
    
    $(window).scroll(function(){
    if (window.pageYOffset >= 100) {
        $('.navbar').css("opacity","0.9");
        $('.navbar').css("box-shadow","0px 4px 23px #000000");
    } else {
        $('.navbar').css("opacity","1");
        $('.navbar').css("box-shadow","0px 0px 0px");
    }
});