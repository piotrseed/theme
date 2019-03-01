jQuery(document).ready(function($) {
  $(".seditSlick").slick({
    slidesToShow: 4,
    arrows: false,
    autoplay: true,
    speed: 1000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      }
    ]
  });
  $(".slick-prev").click(function() {
    $(".seditSlick").slick("slickPrev");
  });

  $(".slick-next").click(function() {
    $(".seditSlick").slick("slickNext");
  });

  $("a[href*=\\#]").on("click", function(event) {
    event.preventDefault();
    $("html,body").animate(
      {
        scrollTop: $(this.hash).offset().top
      },
      500
    );
  });

  $(".hamburger").click(function() {
    // $(".show-menu").slideToggle(0);
    $(".show-menu").slideToggle(0, function() {
      if ($(this).is(":visible")) $(this).css("display", "flex");
    });
  });

  $("#top-slider").responsiveSlides({
    pager: false,
    timeout: 4000,
    nav: true,
    prevText: "",
    nextText: "",
    speed: 1000
  });
});
