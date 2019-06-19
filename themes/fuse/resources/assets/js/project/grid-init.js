function resizeGridItem( item ) {

    const grid = document.querySelector( '.c-gallery--photo' );

    const rowHeight = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-auto-rows' ));

    const rowGap = parseInt( window.getComputedStyle( grid ).getPropertyValue( 'grid-row-gap' ));

    const rowSpan = Math.ceil(( item.querySelector( '.c-progressive' ).getBoundingClientRect().height+rowGap )/( rowHeight+rowGap ));

    /* eslint-disable */
    item.style.gridRowEnd = `span ${rowSpan}`;

}

function resizeAllGridItems() {

	const allItems = document.querySelectorAll( '.c-gallery--photo .c-gallery__media' );

    allItems.forEach( item => {

        resizeGridItem( item )

    })

}

function resizeInstance( instance ) {

    // const item = instance.elements[0];
    resizeGridItem( instance );

}

window.onload = resizeAllGridItems();
window.addEventListener( 'resize', resizeAllGridItems );

const allItems = document.querySelectorAll( '.c-gallery--photo .c-gallery__media' );

allItems.forEach( item => {

	item.addEventListener( 'progressiveImageLoaded', resizeInstance( item ) )

})
