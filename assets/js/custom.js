new WOW().init();

if ($('.categories-carousel')) {
  $('.categories-carousel, .news-carousel').owlCarousel({
    autoplay: 4000,
    items: 3,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
  });
}

