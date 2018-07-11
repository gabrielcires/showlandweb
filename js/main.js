// prueba de animaciones
setTimeout(function(){
    var a = document.getElementById("iniAnim");
    a.className += " anim";       
    setTimeout(function(){
        var b = document.getElementById("loadsc");
        b.className += " no-disp";
    }, 500);
}, 3100);

// toggle menu
function toggleMenu(x) {
        var m = document.getElementById("menu");
        x.classList.toggle("change");
        m.classList.toggle("show-menu");
    }

// toggle submenu
function toggleSubMenu(x) {
        var sm = document.getElementById("subMenu");
        sm.classList.toggle("show-menu");
    }

// smothscroll
// $(document).on('click', 'a[href^="#"]', function (event) {
//     event.preventDefault();
    
//     $('html, body').animate({
//         scrollTop: $($.attr(this, 'href')).offset().top
//     }, 500);
// });