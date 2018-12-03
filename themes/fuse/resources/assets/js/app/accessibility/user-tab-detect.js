/**
 * We need a way to detect if the user is tabbing through our site, because we
 * do not want to enable the ugly default focus ring for everyone, only people
 * who need it.
 *
 * @example https://hackernoon.com/removing-that-ugly-focus-ring-and-keeping-it-too-6c8727fefcd2
 */

// The class to add or remove
const userTabbingClass = 'user-is-tabbing';

/**
 * The first time the user hits tab, let's add a class to
 * the body to allow unique focus styling for this scenario,
 * and then watch for a mousedown event in case we need to
 * remove the class
 *
 * @param {Object} e - the keyboard event
 */

function handleFirstTab( e ) {

    // the "I am a keyboard user" key
    if ( e.keyCode === 9 ) {

        document.body.classList.add( userTabbingClass );

        window.removeEventListener( 'keydown', handleFirstTab );
        window.addEventListener( 'mousedown', handleMouseDownOnce );

    }

}

/**
 * When the user clicks, if the tabbing class is added to the body,
 * we are returning to the default state by removing the class,
 * and putting our listener back in place for another potential
 * tabbed navigation event.
 */
function handleMouseDownOnce() {

    // Do nothing if our tabbing class doesn't exist
    if ( ! document.body.classList.contains( userTabbingClass ))
        return;

    document.body.classList.remove( userTabbingClass );

    window.removeEventListener( 'mousedown', handleMouseDownOnce );
    window.addEventListener( 'keydown', handleFirstTab );

}

window.addEventListener( 'keydown', handleFirstTab );