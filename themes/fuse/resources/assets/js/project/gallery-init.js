import * as PhotoSwipe from './photoswipe/photoswipe'
import * as PhotoSwipeUI_Default from './photoswipe/photoswipe-ui-default' // eslint-disable-line

/**
 * Currently Using: https://photoswipe.com/
 */

const photos = document.querySelectorAll( '.js-lightbox' );
let galleryData = []; // eslint-disable-line

/**
 * Get the position of an element in the page and return the values needed by
 * the getThumbBoundsFn function as defined in https://photoswipe.com/documentation/options.html
 *
 * @param {*} element
 * @return {Object} the coordinates of the thumbnail to be opened
 */
const getElementPagePosition = ( element ) => {

    const pageYScroll =  window.pageYOffset || document.documentElement.scrollTop;
    const elementPosition = element.getBoundingClientRect();

    return {
        x:elementPosition.left,
        y:elementPosition.top + pageYScroll,
        w:elementPosition.width,
    };

}

const openPhotoSwipe = ( index, photo ) => {

    const photoSwipeElement = document.querySelectorAll( '.pswp' )[0];
    const image = photo.querySelector( '.c-progressive__image' );

    // define options for PhotoSwipe Gallery
    const options = {
        index,
        showHideOpacity: false,
        getThumbBoundsFn: () => getElementPagePosition( image ),
    };

    const gallery = new PhotoSwipe( photoSwipeElement, PhotoSwipeUI_Default, galleryData, options );
    gallery.init();

}


const handlePhotoClick = ( photo, index, event ) => {

    if( ! photo ) return false;

    return openPhotoSwipe( index, photo );

}

photos.forEach(( photo, index ) => {

    photo.addEventListener( 'click', ( event ) => {

        event.preventDefault();
        handlePhotoClick( photo, index, event );

    });

});

photos.forEach(( photo, index ) => {

    const size = photo.getAttribute( 'data-size' ).split( 'x' );

    const photoData = {

        src: photo.getAttribute( 'href' ),
        w: parseInt( size[0], 10 ),
        h: parseInt( size[1], 10 ),
        msrc: photo.getAttribute( 'data-placeholder-url' ),

    }

    galleryData.push ( photoData );

});
