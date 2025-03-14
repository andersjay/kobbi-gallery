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

jQuery("#artist-gallery").nanogallery2({
  itemsBaseURL: '',
  items: galleryImages,
 
  // GALLERY AND THUMBNAIL LAYOUT
  galleryMosaic : [                       // default layout
     { "w": 16, "h": 18, "c": 1,  "r": 1  },
     { "w": 8,  "h": 9,  "c": 21, "r": 5  },
     { "w": 4,  "h": 6,  "c": 28, "r": 2  },
     { "w": 4,  "h": 6,  "c": 19, "r": 11 },
     { "w": 6,  "h": 8,  "c": 27, "r": 10 }
  ],
  galleryMosaicXS : [                     // layout for XS width
     { "w": 6, "h": 9, "c": 1,  "r": 1  },
     { "w": 4,  "h": 4,  "c": 9, "r": 3  },
     { "w": 2,  "h": 3,  "c": 12, "r": 1  },
     { "w": 2,  "h": 3,  "c": 8, "r": 5 },
     { "w": 3,  "h": 4,  "c": 12, "r": 6 }
  ],
  galleryMosaicSM : [                     // layout for SM width
     { "w": 6, "h": 9, "c": 1,  "r": 1  },
     { "w": 4,  "h": 4,  "c": 9, "r": 3  },
     { "w": 2,  "h": 3,  "c": 12, "r": 1  },
     { "w": 2,  "h": 3,  "c": 8, "r": 5 },
     { "w": 3,  "h": 4,  "c": 12, "r": 6 }
  ],
  galleryMaxRows: 1,
  galleryDisplayMode: 'rows',
  gallerySorting: 'random',
  thumbnailDisplayOrder: 'random',

  thumbnailAlignment: 'scaled',
  thumbnailHeight: 100, thumbnailWidth: 100,
  thumbnailGutterWidth: 0, thumbnailGutterHeight: 0,
  thumbnailBorderHorizontal: 0, thumbnailBorderVertical: 0,

  thumbnailToolbarImage : null,
  thumbnailToolbarAlbum: null,

  thumbnailLabel: { display: false },
  
  // DISPLAY ANIMATION
  galleryDisplayTransition: 'rotateX',        // gallery display animation
  galleryDisplayTransitionDuration: 1500,
  thumbnailDisplayTransition: 'scaleUp',     // thumbnail display animation
  thumbnailDisplayTransitionDuration: 600,
  thumbnailDisplayInterval: 30,


  // HOVER ANIMATION
  thumbnailBuildInit2: '.nGY2GThumbnailAlbumTitle_border-left_5px solid #23CB99|.nGY2GThumbnailAlbumTitle_margin_20px|\
        title_backgroundColor_rgba(200,200,200,0.8)|title_color_#000',
  thumbnailHoverEffect2: 'image_scale_1.00_1.15_500_bounce|image_rotateZ_0deg_05deg',
  touchAnimation: true,
  touchAutoOpenDelay: 500,

  // LIGHTBOX
  viewerToolbar:    {   // bottom toolbar
    display: true,
    standard:  'label',
    minimized: 'label' },
  viewerTools:    {
    topLeft:   '',
    topRight:  'rotateLeft, rotateRight, fullscreenButton, closeButton'
  },

  // DEEP LINKING
  locationHash: false
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
          thumbnailWidth: '350',
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