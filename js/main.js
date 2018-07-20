
// toggle menu
function toggleMenu(x) {
    var menu = document.getElementById("menu");
    x.classList.toggle("change");
    menu.classList.toggle("show-menu");
}

// toggle submenu
function toggleSubMenu(x) {
    var subMenu = document.getElementById("subMenu");
    var ad = document.getElementById("arrowDown");
    subMenu.classList.toggle("show-menu");
    ad.classList.toggle("show-menu");
}

// toggle contacto
var menuCont = document.getElementById("menuCont");
var menuAnim = document.getElementById("menuAnim");
var c = document.getElementById("contacto");
var social = document.getElementById("social");

function toggleContacto(x) {
    var contArrow = document.getElementById("contArrow");
    menuCont.classList.toggle("fade-out");
    menuAnim.classList.toggle("fade-out");
    social.classList.toggle("fade-out");
    c.classList.toggle("show-contacto");
    contArrow.classList.add("fade-in");
}

function ContactoOut(x) {
    menuCont.classList.remove("fade-out");
    menuAnim.classList.remove("fade-out");
    social.classList.remove("fade-out");
    c.classList.remove("show-contacto");
    x.classList.remove("fade-in");
}

// slider
var slider = tns({
    container: '.first-slider',
    slideBy: 'page',
    autoplay: true,
    controls: false,
    items: 1,
    arrowKeys: false,
    slideBy: 1,
    nav: false,
    navContainer: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    autoplayButtonOutput: false,
    touch: true,
    mouseDrag: true,
    mode: 'gallery',
    speed: 600,
});

// Do anim on scroll
function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function () {
    $('.whait').each(function () {
        if (isScrolledIntoView(this) === true) {
            $(this).addClass('doAnim')
        }
    });
});


// formvalidation
// var form = document.getElementById("contactForm");
// var isValidForm = form.checkValidity();
