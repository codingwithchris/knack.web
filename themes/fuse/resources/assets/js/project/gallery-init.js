import * as PhotoSwipe from './photoswipe/photoswipe'
import * as PhotoSwipeUI_Default from './photoswipe/photoswipe-ui-default' // eslint-disable-line

/**
 * Currently Using: https://photoswipe.com/
 */

const photos = document.querySelectorAll( '.js-lightbox' );

let galleryData = []; // eslint-disable-line
const galleryElement = document.querySelectorAll( '.pswp' )[0];

// define options (if needed)
const options = {
    index: 0, // start at first slide
};

const gallery = new PhotoSwipe( galleryElement, PhotoSwipeUI_Default, photos, options ); // eslint-disable-line

const handlePhotoClick = ( index ) => {

}

photos.forEach(( photo, index ) => {

    photo.addEventListener( 'click', ( event ) => {

        event.preventDefault();
 		handlePhotoClick( index );

    });

});

photos.forEach(( photo, index ) => {

    //    galleryData.index.src = photo.getAttribute( 'href' );

});



console.log( photos );
console.log( galleryData );
