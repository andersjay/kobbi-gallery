<div class="px-4 lg:px-0 pt-28 max-w-[1068px] w-full mx-auto bg-black">
    <h2 class="text-4xl text-white font-bold">ARTISTAS</h2>
    <div class="lg:grid lg:grid-cols-[400px_1fr] pt-12">
        <div class="w-full lg:p-4">
            <ul>
                @foreach ($artists as $index => $artist)
                    <li class="cursor-pointer font-bold text-2xl p-2 

                    {{ $selectedArtist && $selectedArtist['name'] === $artist->name ? 'text-white' : 'text-gray-400' }}"
                        wire:click="selectArtist({{ $artist->id }})">
                        {{ $artist->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-full p-6 text-white text-xl">
            @if ($selectedArtist)
                <div class="flex flex-wrap">
                    @foreach ($selectedArtist['images'] as $image)
                        <div class="w-full">
                            <div id="artist-gallery"></div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        Livewire.on("artistSelected", function(artistSelected) {
            jQuery("#artist-gallery").nanogallery2({
                itemsBaseURL: '',
                items: artistSelected[0],

                // GALLERY AND THUMBNAIL LAYOUT
                galleryMosaic: [ // default layout
                    {
                        "w": 16,
                        "h": 18,
                        "c": 1,
                        "r": 1
                    },
                    {
                        "w": 8,
                        "h": 9,
                        "c": 21,
                        "r": 5
                    },
                    {
                        "w": 4,
                        "h": 6,
                        "c": 28,
                        "r": 2
                    },
                    {
                        "w": 4,
                        "h": 6,
                        "c": 19,
                        "r": 11
                    },
                    {
                        "w": 6,
                        "h": 8,
                        "c": 27,
                        "r": 10
                    }
                ],
                galleryMosaicXS: [ // layout for XS width
                    {
                        "w": 6,
                        "h": 9,
                        "c": 1,
                        "r": 1
                    },
                    {
                        "w": 4,
                        "h": 4,
                        "c": 9,
                        "r": 3
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 12,
                        "r": 1
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 8,
                        "r": 5
                    },
                    {
                        "w": 3,
                        "h": 4,
                        "c": 12,
                        "r": 6
                    }
                ],
                galleryMosaicSM: [ // layout for SM width
                    {
                        "w": 6,
                        "h": 9,
                        "c": 1,
                        "r": 1
                    },
                    {
                        "w": 4,
                        "h": 4,
                        "c": 9,
                        "r": 3
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 12,
                        "r": 1
                    },
                    {
                        "w": 2,
                        "h": 3,
                        "c": 8,
                        "r": 5
                    },
                    {
                        "w": 3,
                        "h": 4,
                        "c": 12,
                        "r": 6
                    }
                ],
                galleryMaxRows: 1,
                galleryDisplayMode: 'rows',
                gallerySorting: 'random',
                thumbnailDisplayOrder: 'random',

                thumbnailAlignment: 'scaled',
                thumbnailHeight: 100,
                thumbnailWidth: 100,
                thumbnailGutterWidth: 0,
                thumbnailGutterHeight: 0,
                thumbnailBorderHorizontal: 0,
                thumbnailBorderVertical: 0,

                thumbnailToolbarImage: null,
                thumbnailToolbarAlbum: null,

                thumbnailLabel: {
                    display: false
                },

                // DISPLAY ANIMATION
                galleryDisplayTransition: 'rotateX', // gallery display animation
                galleryDisplayTransitionDuration: 1500,
                thumbnailDisplayTransition: 'scaleUp', // thumbnail display animation
                thumbnailDisplayTransitionDuration: 600,
                thumbnailDisplayInterval: 30,


                // HOVER ANIMATION
                thumbnailBuildInit2: '.nGY2GThumbnailAlbumTitle_border-left_5px solid #23CB99|.nGY2GThumbnailAlbumTitle_margin_20px|\
        title_backgroundColor_rgba(200,200,200,0.8)|title_color_#000',
                thumbnailHoverEffect2: 'image_scale_1.00_1.15_500_bounce|image_rotateZ_0deg_05deg',
                touchAnimation: true,
                touchAutoOpenDelay: 500,

                // LIGHTBOX
                viewerToolbar: { // bottom toolbar
                    display: true,
                    standard: 'label',
                    minimized: 'label'
                },
                viewerTools: {
                    topLeft: '',
                    topRight: 'rotateLeft, rotateRight, fullscreenButton, closeButton'
                },

                // DEEP LINKING
                locationHash: false
            });

        });
    });
</script>
