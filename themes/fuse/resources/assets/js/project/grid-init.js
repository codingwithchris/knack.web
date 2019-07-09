import Masonry from 'masonry-layout'
import imagesLoaded from 'imagesloaded';

// vanilla JS
// init with element
const grid = document.querySelector( '.c-gallery--photo' );


const msnry = new Masonry( grid, {

    itemSelector: '.c-gallery__media',
    columnWidth: '.c-gallery__grid-sizer',
    gutter: '.c-gallery__gutter-sizer',
    percentPosition: true,
    transitionDuration: '0.2s',

});

const imgLoad = imagesLoaded( grid );

imgLoad.on( 'done', () => {

    msnry.layout();

});
