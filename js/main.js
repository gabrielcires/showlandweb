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

// toggle form
function formExpand(x) {
    $('.form-cont').removeClass('expanded');
    setTimeout(function () {
        $('.form-cont').removeClass('noDisplay');
    }, 300);
    $(x).addClass("expanded");
    setTimeout(function () {
        $(x).addClass("noDisplay");
    }, 350);
}

// slider
$(".first-slider").each(function (index, element) {
    var $this = $(this);
    $this.addClass("instance-" + index);
    var swiper = new Swiper(".instance-" + index, {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        effect: 'fade',
        keyboard: {
            enabled: true,
        },
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }

    });
    var mySwiper = document.querySelector('.swiper-container').swiper

    $(".swiper-container").mouseenter(function () {
        mySwiper.autoplay.stop();
    });

    $(".swiper-container").mouseleave(function () {
        mySwiper.autoplay.start();
    });

});
$(".opinion-slider").each(function (index, element) {
    var $this = $(this);
    $this.addClass("instance-" + index);
    var swiper = new Swiper(".instance-" + index, {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        effect: 'fade',
        keyboard: {
            enabled: true,
        },
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },

        // If we need pagination

    });
    var mySwiper = document.querySelector('.swiper-container').swiper

    $(".swiper-container").mouseenter(function () {
        mySwiper.autoplay.stop();
    });

    $(".swiper-container").mouseleave(function () {
        mySwiper.autoplay.start();
    });

});

AOS.init({
    // Global settings
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'load', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll

    // Settings that can be overriden on per-element basis, by `data-aos-*` attributes:
    offset: 0, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: true, // whether elements should animate out while scrolling past them
    anchorPlacement: 'bottom-bottom', // defines which position of the element regarding to window should trigger the animation
});
AOS.refresh()

// video
jQuery(function () {
    jQuery("#videoShow").YTPlayer();
});

$('.subject-list').on('change', function () {
    $('.subject-list').not(this).prop('checked', false);
});

//Validations
$(document).ready(function () {
    var invalidClassName = 'input-errors'
    var inputs = document.querySelectorAll('input', 'textarea')
    inputs.forEach(function (input) {
        // Add a css class on submit when the input is invalid.
        input.addEventListener('invalid', function () {
            input.classList.add(invalidClassName)
        })

        // Remove the class when the input becomes valid.
        // 'input' will fire each time the user types
        input.addEventListener('input', function () {
            if (input.validity.valid) {
                input.classList.remove(invalidClassName)
            }
        })
    })

    const customMessages = {
        valueMissing: 'Rellena este campo!', // `required` attr
        emailMismatch: 'Introduce un correo válido' // Invalid email
    }

    function getCustomMessage(type, validity) {
        if (validity.typeMismatch) {
            return customMessages[`${type}Mismatch`]
        } else {
            for (const invalidKey in customMessages) {
                if (validity[invalidKey]) {
                    return customMessages[invalidKey]
                }
            }
        }
    }

    var inputs = document.querySelectorAll('input, select, textarea')
    inputs.forEach(function (input) {
        // Each time the user types or submits, this will
        // check validity, and set a custom message if invalid.
        function checkValidity() {
            const message = input.validity.valid ?
                null :
                getCustomMessage(input.type, input.validity, customMessages)
            input.setCustomValidity(message || '')
        }
        input.addEventListener('input', checkValidity)
        input.addEventListener('invalid', checkValidity)
    })

});