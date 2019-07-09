import Masonry from 'masonry-layout'
import imagesLoaded from 'imagesloaded';

// vanilla JS
// init with element
const grid = document.querySelector( '.c-gallery--photo' );


const msnry = new Masonry( grid, {

    gutter: 8,
    itemSelector: '.c-gallery__media',
  	columnWidth: '.c-gallery__grid-sizer',
    percentPosition: true,

});

const imgLoad = imagesLoaded( grid );

imgLoad.on( 'done', () => {

    msnry.layout();

});
