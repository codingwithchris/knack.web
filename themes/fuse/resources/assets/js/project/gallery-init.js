import { LuminousGallery } from 'luminous-lightbox';

/**
 * Currently Using: https://github.com/imgix/luminous
 * Replace with: https://photoswipe.com/
 */

function initLightbox() {

    const lightboxDataSrc = 'data-lightbox-img';

    const galleryItems = document.querySelectorAll( `[${lightboxDataSrc}]` );

    const galleryOptions = {}

    // Lightbox Options
    const lightboxOptions = {

        sourceAttribute: lightboxDataSrc,
        showCloseButton: true,
        injectBaseStyles: true,

    }

    const gallery = () => new LuminousGallery( galleryItems, galleryOptions, lightboxOptions );
    gallery();

}

document.addEventListener( 'DOMContentLoaded', initLightbox );
