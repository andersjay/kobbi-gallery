@extends('layouts.app')

@section('content')
  <div class="8 md:px-10 lg:px-6 xl:px-4 pt-14 mt-4 max-w-[1440px] w-full mx-auto pb-10  bg-black">
    <div class="px-4 mt-12">
      <h2 class="text-4xl text-white font-bold">GALERIA</h2>
      <div class="mt-8 w-full">
        <div>
          <p class="text-gray-400 text-lg">Fundada com a missão de explorar a fotografia e sua história, a Kobbi Gallery se estabeleceu como uma referência essencial no cenário da fotografia artística paulistana. Localizada na Vila Madalena, em São Paulo, a galeria dedica-se tanto à pesquisa quanto à realização de exposições que valorizem a potência e a singularidade de diferentes fotógrafos, posicionando-os tanto no mercado nacional quanto internacional. Trabalhando com uma variedade de artistas contemporâneos e reconhecidos, a Kobbi Gallery oferece um espaço dinâmico para a exploração de diferentes perspectivas e narrativas fotográficas.</p>
          
          <p class="mt-4 text-gray-400 text-lg">
            Dirigida por Eduardo e Cristina Kobbi, conta com um grupo de profissionais apaixonados e experientes, comprometidos em criar uma programação inovadora e relevante. Com um espaço expositivo cuidadosamente projetado, o local proporciona uma experiência imersiva e enriquecedora para os visitantes, sejam eles brasileiros ou estrangeiros, incentivando o diálogo entre a arte e o ambiente urbano.
          </p>

          <p class="mt-4 text-gray-400 text-lg">
            A expansão recente de sua proposta expositiva reforça seu compromisso com a promoção tanto da fotografia quanto da arte contemporânea, uma vez que destaca seu empenho com uma abordagem curatorial que se estende desde a fotografia tradicional até as novas mídias. Com o compromisso de promover a pluralidade a partir de iniciativas baseadas na criatividade e no rigor acadêmico, celebramos a rica história da fotografia, ao mesmo tempo em que exploramos as infinitas possibilidades oferecidas por esse meio artístico.
          </p>
        </div>
      </div>
    </div>

    <div class="w-full px-4 mt-8">
        <div id="gallery-nano"></div>
    </div>
  </div>

  <script>
      const galleryImages = @json($galleryImages);
        jQuery("#gallery-nano").nanogallery2({
        
        // CONTENT SOURCE
        // The optional add-on nanoPhotosProvider is used for this example - this is not mandatory and can easily be replaced by a list of medias
        url : '',
        items: galleryImages,
          
        // GALLERY AND THUMBNAIL LAYOUT
        galleryMosaic : [                       // default layout
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
        galleryMosaicXS : [                     // layout for XS width
          { w: 2, h: 2, c: 1, r: 1 },
          { w: 1, h: 1, c: 3, r: 1 },
          { w: 1, h: 1, c: 3, r: 2 },
          { w: 1, h: 2, c: 1, r: 3 },
          { w: 2, h: 1, c: 2, r: 3 },
          { w: 1, h: 1, c: 2, r: 4 },
          { w: 1, h: 1, c: 3, r: 4 }
        ],
        galleryMosaicSM : [                     // layout for SM width
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

        thumbnailHeight: '180', thumbnailWidth: '220',
        thumbnailAlignment: 'scaled',
        thumbnailGutterWidth: 0, thumbnailGutterHeight: 0,
        thumbnailBorderHorizontal: 0, thumbnailBorderVertical: 0,

        thumbnailToolbarImage: null,
        thumbnailToolbarAlbum: null,
        thumbnailLabel: { display: false },

        // DISPLAY ANIMATION
        // for gallery
        galleryDisplayTransitionDuration: 1500,
        // for thumbnails
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
        viewerTools:    {
          topLeft:   'label',
          topRight:  'shareButton, rotateLeft, rotateRight, fullscreenButton, closeButton'
        },

        // GALLERY THEME
        galleryTheme : { 
          thumbnail: { background: '#111' },
        },
        
        // DEEP LINKING
        locationHash: true
      });
  </script>
@endsection