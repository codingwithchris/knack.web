import throttle from 'lodash.throttle';

/**
 * Inspo :  https://medium.com/@andybarefoot/a-masonry-style-layout-using-css-grid-8c663d355ebb
 */

/**
 * Init a resize of a single grid item in relation to the grid
 *
 * @param {*} item
 */
function resizeGridItem( item ) {

    // We have to compare each item to the grid each time an item needs to be resized
    const grid = document.querySelector( '.c-gallery--photo' );

    // The wrapper for our progressive loading image... we have to set some properties here to make everything work :/
    const gridDirectChild = item.closest( '.c-gallery__media' );

    const rowHeight = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-auto-rows' ));

    const rowGap = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-row-gap' ));

    const rowSpan = Math.ceil(( item.getBoundingClientRect().height+rowGap )/( rowHeight+rowGap ));

    /* eslint-disable */
	gridDirectChild.style.gridRowEnd = `span ${rowSpan}`;

}

/**
 *
 */
function resizeAllGridItems() {

	const allItems = document.querySelectorAll( '.c-gallery--photo .c-progressive' );

    allItems.forEach( item => {

        resizeGridItem( item )

    })

}

/**
 * Resize the entire grid on load and when the user resizes the window (throttled of course!)
 */
window.onload = resizeAllGridItems;
window.addEventListener( 'resize', throttle( resizeAllGridItems ), 100 );
