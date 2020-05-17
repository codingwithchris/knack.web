
// Tell the document about a new urlCoped event so we can watch for it from anywhere
const dispatchCopiedURLEvent = ( url ) => {

    const event = new CustomEvent( 'urlCopied', { detail: url });
    document.dispatchEvent( event );

}

/**
 * Handle copy tpo clipboard functionality.
 * Reference: https://hackernoon.com/copying-text-to-clipboard-with-javascript-df4d4988697f
 */
const copyToClipboard = () => {

    // Copy current URL without anchors refs (#)
    const currentURL = window.location.href.split( '#' )[ 0 ];

    // Make sure our dependencies exist
    if( ! currentURL ) {

        return;

    }

    // Create an invisible input that we can eventually leverage with execCommand
    const input = document.createElement( 'textarea' ); // Create a <textarea> element
    input.value = currentURL; // Set its value to the string that you want copied
    input.setAttribute( 'readonly', '' ); // Make it readonly to be tamper-proof
    input.style.position = 'absolute';
  	input.style.left = '-9999px'; // Move outside the screen to make it invisible
    document.body.appendChild( input ); // Append the <textarea> element to the HTML document

    const selected =
    document.getSelection().rangeCount > 0        // Check if there is any content selected previously
        ? document.getSelection().getRangeAt( 0 )     // Store selection if found
        : false;

    input.select();

    document.execCommand( 'copy' );                   // Copy - only works as a result of a user action (e.g. click events)
    document.body.removeChild( input );               // Remove the <textarea> element

    if ( selected ) {                                 // If a selection existed before copying

	  document.getSelection().removeAllRanges();    // Unselect everything on the HTML document
	  document.getSelection().addRange( selected );  // Restore the original selection

    }

    dispatchCopiedURLEvent( currentURL );

}

/**
 * Find copy to clipboard elements and watch for clicks
 */
const initCopyToClipboard  = () => {

    const copyElements = document.querySelectorAll( '.js-copy-to-clipboard' );

    if( ! copyElements ) {

        return;

    }

    copyElements.forEach( element => {

        element.addEventListener( 'click', copyToClipboard );

    });

}

/**
 * @param element
 */
const showSuccess = ( element ) => {

    element.classList.add( '--visible' );

}

/**
 *
 * @param {*} element
 */
const dismissSuccess = ( element ) => {

    element.classList.remove( '--visible' );

}

// Check for anchors on DOM Load
document.addEventListener( 'DOMContentLoaded', initCopyToClipboard );

// Handle a successful copy
document.addEventListener( 'urlCopied', () => {

    const element = document.querySelector( '.c-share-action.--url .c-share-action__success' );

    if( ! element ) {

        return;

    }

    showSuccess( element );

    // Remove the notice after a set amount of time
    setTimeout(() => dismissSuccess( element ), 1500 );

});
