import Masonry from 'masonry-layout'
import imagesLoaded from 'imagesloaded'

// Using https://masonry.desandro.com

const container = document.querySelector( '.c-gallery--photo' );
const images = document.querySelectorAll( '.c-progressive__placeholder' );

const masonryGrid = new Masonry( container, {
    columnWidth: '.c-gallery__grid-sizer',
    itemSelector: '.c-gallery__media',
    percentPosition: true,
    gutter: 8,
});

// create an instance
imagesLoaded( images, () => {

    masonryGrid.layout();

});
