import 'intersection-observer';

const progressiveImages = document.querySelectorAll( '.c-progressive' );
const imageLoadedEvent = new CustomEvent( 'progressiveImageLoaded' );

// inspo - https://www.sitepoint.com/how-to-build-your-own-progressive-image-loader/
// inspo - https://github.com/thinker3197/progressively

/**
 * Create an intersection observer according to the Intersection Observer API
 * to watch all of the "progressive" images on the page. This method is preferred
 * now when lazy loading images/checking to see if the image is within the viewport.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API
 */
function createProgressiveImageIntersectionObserver() {

    // If we don't have support for intersection observer, load all the images immediately
    if ( ! ( 'IntersectionObserver' in window )) {

        progressiveImages.forEach( image =>  {

            prepareProgressiveImage( image )

        });

    } else {

        const observerConfig  = {
            rootMargin: '50px 0px',
            threshold : 0,
        }

        // Using the new Intersection Observer API
        const observer = new IntersectionObserver( handleImageVisible, observerConfig );

        // Watch each of our images
        progressiveImages.forEach( image => {

            observer.observe( image );

        });


    }

}

/**
 *
 * @param {*} entries
 * @param {*} observerInstance
 */
function handleImageVisible( entries, observerInstance ) {

    entries.forEach( entry => {

        // If the image is intersecting and has not been loaded yet, handle the loading process.
        if( entry.isIntersecting ) {

            // Stop watching and load the image
            observerInstance.unobserve( entry.target );
            prepareProgressiveImage( entry.target );

        }

    });

}

/**
 *
 * @param {*} element
 */
function prepareProgressiveImage( element ) {

    // Can't continue if a full image is not defined
    if ( ! element || ! element.getAttribute( 'data-src' )) return;

    const fullImage = new Image();
    const previewImage = element.firstElementChild;

    // Handle working with responsive images! yay!!!
    if( element.dataset ) {

        fullImage.srcset = element.dataset.srcset || '';
        fullImage.sizes = element.dataset.sizes || '';

    }

    if( previewImage ) {

        fullImage.alt = previewImage.alt || '';
        fullImage.width = previewImage.width || '';
        fullImage.height = previewImage.height || '';

    }

    // eslint-disable-next-line
	fullImage.className = 'c-progressive__image --full --revealing';
    fullImage.src = element.dataset.src;

    fullImage.onload = () => {

        const newImageElement = element.appendChild( fullImage );

        newImageElement.addEventListener( 'animationend', ( event ) => {

            element.removeChild( previewImage );
            event.target.classList.remove( '--revealing' );

        });

    }

}

/**
 * Create our intersection observer when the page loads
 */
window.addEventListener( 'load', () => {

    createProgressiveImageIntersectionObserver();

});
