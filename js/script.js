// dropdown menu

let status = true;

let line1 = document.querySelector('#menu_line_1');
let line2 = document.querySelector('#menu_line_2');
let line3 = document.querySelector('#menu_line_3');

let overlay = document.querySelector('.overlay');

let nav = document.querySelector('.mobile_navigation');

let icon = document.querySelector('.dropdown_menu');
icon.addEventListener('click', () => {
    if ( status == true ) {
        status = false;

        overlay.style.visibility = "visible";
        overlay.style.opacity = "1";

        line1.style.transform = "rotate(45deg)";
        line1.style.top = "11px";

        line2.style.opacity = "0";

        line3.style.transform = "rotate(-45deg)";
        line3.style.top = "-11px";

        nav.style.left = "0";
        nav.style.opacity = "1";
    } else {
        status = true;

        overlay.style.opacity = "0";
        overlay.style.visibility = "hidden";

        line1.style.transform = "rotate(0deg)";
        line1.style.top = "0";

        line2.style.opacity = "1";

        line3.style.transform = "rotate(0deg)";
        line3.style.top = "0";

        nav.style.left = "-400px";
        nav.style.opacity = "0";
    }
});