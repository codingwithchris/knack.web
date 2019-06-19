import 'intersection-observer';

const images = document.querySelectorAll( '.c-progressive' );
const imageLoadedEvent = new CustomEvent( 'progressiveImageLoaded' );

function watchImages() {

    const config = {

        threshold: .3,

    }

    const observer = new IntersectionObserver( entries => {

        entries.forEach( entry => {

            if ( entry.isIntersecting ) {

                triggerProgressiveLoad( entry.target );
                observer.unobserve( entry.target );

            }

        });


    }, config );

    images.forEach( image => {

        observer.observe( image );

    });

}

function triggerProgressiveLoad( element ) {

    const image = new Image();
    const placeholder = element.querySelector( '.c-progressive__placeholder' );
    const newImage = element.querySelector( '.c-progressive__image' );

    // Set the new image src to the real image, which triggers an image fetch
    image.src = placeholder.getAttribute( 'data-src' );



    // Wait until the image loads
    image.onload = () => {

        newImage.src = image.src;
        placeholder.classList.add( '--hidden' );
        newImage.classList.add( '--loaded' );

        // Dispatch DOM Event after a new image is laoded
        newImage.dispatchEvent( imageLoadedEvent );

    }

}

document.addEventListener( 'DOMContentLoaded', watchImages );
