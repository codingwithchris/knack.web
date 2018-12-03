/**
 * Smooth Scroll to a targeted anchor.
 * This is a simple and elegant way to make it happen WITHOUT libraries!
 *
 * @see https://themodernweb.co.uk/2018/03/smooth-scrolling-to-elements-with-javascript-no-jquery/
 * @see https://developer.mozilla.org/en-US/docs/Web/API/Window/scrollTo
 * @since 1.1.0
 */

/**
 * Init a smooth Scroll event to a desired target
 *
 * @param {Object} targetCoordinates - The location on the page of our target.
 * @param {number} scrollOffset - An offset number to either over-scroll or under-scroll by, relative tot he target.
 */
function scroll( targetCoordinates, scrollOffset = 0 ) {

    // Smooth scroll to our element
    window.scrollTo({
        top: targetCoordinates.top + scrollOffset,

        behavior: 'smooth',
    });

}

/**
 * Get the target of an on-page anchor link (#).
 *
 * @param {Object} event - The click event that triggered this function
 * @returns {Object} The location on the page of the click target
 */
function getScrollTarget( event ) {

    // if the the href of the link does not equal a string, simply return
    if ( typeof this.href !== 'string' ) return false;

    // Get the index of the hash within the links href value
    const hashPos = this.href.indexOf( '#' );

    // If no hash character exists in the string, simply return
    if ( hashPos === -1 ) return false;

    // Get the hash value/target
    const hash = this.href.substr( hashPos );

    // Find the element on the page using the #something value above
    const target = document.querySelector( hash );

    // If no element contains and id with this hash, simply return
    if ( !target ) return false;

    // Prevent default link behavior if we've gotten this far (meaning we have a valid target)
    event.preventDefault();

    // Where are we scrolling to?
    const targetCoordinates = target.getBoundingClientRect();

    // If we can't get a target, we have to bail
    if ( !targetCoordinates ) return false;

    // Give back the coordinates object
    return targetCoordinates;

}

/**
 * Get any anchors we want to use fro smooth-scrolling
 */
function getSmoothScrollAnchors() {

    // Get our anchors
    const anchors = document.querySelectorAll( '.js-scroll-to' );

    // Check for anchors before executing
    if ( !anchors ) return;

    // Loop over each anchor and watch for clicks
    anchors.forEach( anchor => {

        anchor.addEventListener( 'click', event => {

            // Fire our scroll event on the desired target
            scroll( getScrollTarget( event ));

        });

    });

}

// Check for anchors on DOM Load
document.addEventListener( 'DOMContentLoaded', getSmoothScrollAnchors );
