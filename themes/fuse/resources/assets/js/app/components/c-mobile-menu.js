const MobileMenuTrigger = document.querySelector( '.js-open-mobile-menu' );
const MobileMenu = document.getElementById( 'mobile-menu' );
const header = document.querySelector( '.c-header' );
const siteContent = document.getElementById( 'site-content' );
const footer = document.querySelector( '.c-footer' );


function handleMobileMenuDisplay() {

    return ( MobileMenu.getAttribute( 'aria-hidden' ) === 'false' )
        ? closeMobileMenu()
        : openMobileMenu()

}

function openMobileMenu() {

    MobileMenuTrigger.classList.add( '--active' );
    MobileMenu.classList.add( '--active' );
    document.body.classList.add( 'u-disable-scroll' );
    header.classList.add( '--mobile-menu-open' );

    MobileMenuTrigger.setAttribute( 'aria-expanded', 'true' );
    MobileMenu.setAttribute( 'aria-hidden', 'false' );
    footer.setAttribute( 'aria-hidden', 'true' );
    siteContent.setAttribute( 'aria-hidden', 'true' );

}

function closeMobileMenu() {

    MobileMenuTrigger.classList.remove( '--active' );
    MobileMenu.classList.remove( '--active' );
    document.body.classList.remove( 'u-disable-scroll' );
    header.classList.remove( '--mobile-menu-open' );

    MobileMenuTrigger.setAttribute( 'aria-expanded', 'false' );
    MobileMenu.setAttribute( 'aria-hidden', 'true' );
    footer.setAttribute( 'aria-hidden', 'false' );
    siteContent.setAttribute( 'aria-hidden', 'false' );

}

if( MobileMenuTrigger ) {

    MobileMenuTrigger.addEventListener( 'click', handleMobileMenuDisplay );

}
