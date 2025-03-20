import './bootstrap';

var swiper = new Swiper(".mySwiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay:{
    delay: 3000,
    disableOnInteraction: false,
  }
});

jQuery(document).ready(function () {
  if (typeof galleryImages !== 'undefined' && Array.isArray(galleryImages)) {
      jQuery("#gallery").nanogallery2({
          // ### gallery settings ### 
          itemsBaseURL: '',
          items: galleryImages,

          // GALLERY AND THUMBNAIL LAYOUT
          galleryMosaic: [
              { w: 2, h: 2, c: 1, r: 1 },
              { w: 1, h: 1, c: 3, r: 1 },
              { w: 1, h: 1, c: 3, r: 2 },
              { w: 1, h: 2, c: 4, r: 1 },
              { w: 2, h: 1, c: 5, r: 1 },
              { w: 2, h: 2, c: 5, r: 2 },
              { w: 1, h: 1, c: 4, r: 3 },
              { w: 2, h: 1, c: 2, r: 3 },
              { w: 1, h: 2, c: 1, r: 3 },
              { w: 1, h: 1, c: 2, r: 4 },
              { w: 2, h: 1, c: 3, r: 4 },
              { w: 1, h: 1, c: 5, r: 4 },
              { w: 1, h: 1, c: 6, r: 4 }
          ],
          galleryMosaicXS: [
              { w: 2, h: 2, c: 1, r: 1 },
              { w: 1, h: 1, c: 3, r: 1 },
              { w: 1, h: 1, c: 3, r: 2 },
              { w: 1, h: 2, c: 1, r: 3 },
              { w: 2, h: 1, c: 2, r: 3 },
              { w: 1, h: 1, c: 2, r: 4 },
              { w: 1, h: 1, c: 3, r: 4 }
          ],
          galleryMosaicSM: [
              { w: 2, h: 2, c: 1, r: 1 },
              { w: 1, h: 1, c: 3, r: 1 },
              { w: 1, h: 1, c: 3, r: 2 },
              { w: 1, h: 2, c: 1, r: 3 },
              { w: 2, h: 1, c: 2, r: 3 },
              { w: 1, h: 1, c: 2, r: 4 },
              { w: 1, h: 1, c: 3, r: 4 }
          ],
          galleryMaxRows: 1,
          galleryDisplayMode: 'rows',
          gallerySorting: 'random',
          thumbnailDisplayOrder: 'random',

          thumbnailHeight: '300', 
          thumbnailWidthXS: '100%',
          thumbnailWidthSM: '50%',
    
          thumbnailAlignment: 'scaled',
          thumbnailGutterWidth: 0, 
          thumbnailGutterHeight: 0,
          thumbnailBorderHorizontal: 0, 
          thumbnailBorderVertical: 0,

          thumbnailToolbarImage: null,
          thumbnailToolbarAlbum: null,
          thumbnailLabel: { display: false },

          // DISPLAY ANIMATION
          galleryDisplayTransitionDuration: 1500,
          thumbnailDisplayTransition: 'imageSlideUp',
          thumbnailDisplayTransitionDuration: 1200,
          thumbnailDisplayTransitionEasing: 'easeInOutQuint',
          thumbnailDisplayInterval: 60,

          // THUMBNAIL HOVER ANIMATION
          thumbnailBuildInit2: 'image_scale_1.15',
          thumbnailHoverEffect2: 'thumbnail_scale_1.00_1.05_300|image_scale_1.15_1.00',
          touchAnimation: true,
          touchAutoOpenDelay: 500,

          // LIGHTBOX
          viewerToolbar: { display: false },
          viewerTools: {
              topLeft: 'label',
              topRight: 'shareButton, rotateLeft, rotateRight, fullscreenButton, closeButton'
          },

          // GALLERY THEME
          galleryTheme: { 
              thumbnail: { background: '#111' }
          },

          // DEEP LINKING
          locationHash: true,

          thumbnailGutterWidth: 1, 
          thumbnailGutterHeight: 1,
          thumbnailBorderHorizontal: 5,
          thumbnailBorderVertical: 5,  
          thumbnailAlignment: 'center',
      });
  } else {
      console.error("galleryImages não foi carregado corretamente.");
  }
});