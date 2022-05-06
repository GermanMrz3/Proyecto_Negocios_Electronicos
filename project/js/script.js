let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

/**
		 * Slick carousel
		 * @description  Enable Slick carousel plugin
		 */
 if ( plugins.slick.length ) {
   var i;
   for ( i = 0; i < plugins.slick.length; i++ ) {
      var $slickItem = $( plugins.slick[ i ] );

      $slickItem.on( 'init', function ( slick ) {
         initLightGallery( $( '[data-lightgallery="group-slick"]' ), 'lightGallery-in-carousel' );
         initLightGallery( $( '[data-lightgallery="item-slick"]' ), 'lightGallery-in-carousel' );
      } );

      $slickItem.slick( {
         slidesToScroll: parseInt( $slickItem.attr( 'data-slide-to-scroll' ) ) || 1,
         asNavFor:       $slickItem.attr( 'data-for' ) || false,
         dots:           $slickItem.attr( "data-dots" ) == "true",
         infinite:       isNoviBuilder ? false : $slickItem.attr( "data-loop" ) == "true",
         focusOnSelect:  false,
         arrows:         $slickItem.attr( "data-arrows" ) == "true",
         swipe:          $slickItem.attr( "data-swipe" ) == "true",
         autoplay:       isNoviBuilder ? false : $slickItem.attr( "data-autoplay" ) == "true",
         centerMode:     $slickItem.attr( "data-center-mode" ) == "true",
         centerPadding:  $slickItem.attr( "data-center-padding" ) ? $slickItem.attr( "data-center-padding" ) : '0.50',
         mobileFirst:    true,
         responsive:     [
            {
               breakpoint: 0,
               settings:   {
                  slidesToShow: parseInt( $slickItem.attr( 'data-items' ) ) || 1,
                  swipe:        $slickItem.attr( 'data-swipe' ) || false
               }
            },
            {
               breakpoint: 479,
               settings:   {
                  slidesToShow: parseInt( $slickItem.attr( 'data-xs-items' ) ) || 1,
                  swipe:        $slickItem.attr( 'data-xs-swipe' ) || false
               }
            },
            {
               breakpoint: 767,
               settings:   {
                  slidesToShow: parseInt( $slickItem.attr( 'data-sm-items' ) ) || 1,
                  swipe:        $slickItem.attr( 'data-sm-swipe' ) || false
               }
            },
            {
               breakpoint: 992,
               settings:   {
                  slidesToShow: parseInt( $slickItem.attr( 'data-md-items' ) ) || 1,
                  swipe:        $slickItem.attr( 'data-md-swipe' ) || false
               }
            },
            {
               breakpoint: 1200,
               settings:   {
                  slidesToShow: parseInt( $slickItem.attr( 'data-lg-items' ) ) || 1,
                  swipe:        $slickItem.attr( 'data-lg-swipe' ) || false
               }
            }
         ]
      } )
         .on( 'afterChange', function ( event, slick, currentSlide, nextSlide ) {
            var $this = $( this ),
               childCarousel = $this.attr( 'data-child' );

            if ( childCarousel ) {
               $( childCarousel + ' .slick-slide' ).removeClass( 'slick-current' );
               $( childCarousel + ' .slick-slide' ).eq( currentSlide ).addClass( 'slick-current' );
            }
         } );
   }
}

$( '.slick-style-1' ).on( 'click', '.slick-slide', function ( e ) {
   e.stopPropagation();
   var index = $( this ).data( "slick-index" ),
      targetSlider = $( '.slick-style-1' );
   if ( targetSlider.slick( 'slickCurrentSlide' ) !== index ) {
      targetSlider.slick( 'slickGoTo', index );
   }
} );

// lightGallery
if (plugins.lightGallery.length) {
   for (var i = 0; i < plugins.lightGallery.length; i++) {
      initLightGallery(plugins.lightGallery[i]);
   }
}

// lightGallery item
if (plugins.lightGalleryItem.length) {
   // Filter carousel items
   var notCarouselItems = [];

   for (var z = 0; z < plugins.lightGalleryItem.length; z++) {
      if (!$(plugins.lightGalleryItem[z]).parents('.owl-carousel').length &&
         !$(plugins.lightGalleryItem[z]).parents('.swiper-slider').length &&
         !$(plugins.lightGalleryItem[z]).parents('.slick-slider').length) {
         notCarouselItems.push(plugins.lightGalleryItem[z]);
      }
   }

   plugins.lightGalleryItem = notCarouselItems;

   for (var i = 0; i < plugins.lightGalleryItem.length; i++) {
      initLightGalleryItem(plugins.lightGalleryItem[i]);
   }
}

// Dynamic lightGallery
if (plugins.lightDynamicGalleryItem.length) {
   for (var i = 0; i < plugins.lightDynamicGalleryItem.length; i++) {
      initDynamicLightGallery(plugins.lightDynamicGalleryItem[i]);
   }
}

// Owl carousel
if ( plugins.owl.length ) {
   for ( var i = 0; i < plugins.owl.length; i++ ) {
      var c = $( plugins.owl[ i ] );
      plugins.owl[ i ].owl = c;

      initOwlCarousel( c );
   }
}