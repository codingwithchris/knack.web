import 'intersection-observer';

const images = document.querySelectorAll( '.c-progressive' );
const imageLoadedEvent = new CustomEvent( 'progressiveImageLoaded' );

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

        images.forEach( image =>  loadProgressiveImage( image ));

    } else {

        const observerConfig  = {
            rootMargin: '50px 0px',
            threshold : 0,
        }

        // Using the new Intersection Observer API
        const observer = new IntersectionObserver( handleImageVisible, observerConfig );

        // Watch each of our images
        images.forEach( image => {

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
            loadProgressiveImage( entry.target );

        }

    });

}

/**
 *
 * @param {*} element
 */
function loadProgressiveImage( image ) {

    // The direct child of `.c-progressive` is always the actual image element
    const imageElement = image.firstElementChild;
    const pseudoImage = new Image();

    pseudoImage.src = imageElement.getAttribute( 'data-progressive' );

    pseudoImage.onload = () => {

        imageElement.classList.remove( '--not-loaded' );
        imageElement.classList.add( '--loaded' );

        if ( imageElement.classList.contains( '.c-progressive__bg' )) {

            imageElement.style['background-image'] = `url( ${imageElement.src} )`

        }else{

            imageElement.src = pseudoImage.src;

        }

    }

}

/**
 * Create our intersection observer when the page loads
 */
window.addEventListener( 'load', () => {

    createProgressiveImageIntersectionObserver();

});
