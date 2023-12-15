let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let prevScrollpos = window.scrollY;

window.addEventListener('scroll', () => {
    var currentScrollPos = window.scrollY;

    if (currentScrollPos > 50) {
        header.style.backgroundColor = 'var(--text-color-light)';
        navbar.style.backgroundColor = 'var(--text-color-light)';
    } else {
        header.style.backgroundColor = 'transparent';
        navbar.style.backgroundColor = 'transparent';
    }

    if (currentScrollPos === 0) {
        header.style.backgroundColor = 'transparent';
        navbar.style.backgroundColor = 'transparent';
    }

    prevScrollpos = currentScrollPos;
});

//tmbhi pengecekan kpn false (user blm login) dan true (user udh login)
const userValid = true;
const signIn= document.getElementById('signin');
const userProfile = document.getElementById('profile');

if (userValid) {
    signIn.style.display = 'none';
    userProfile.style.display = 'inline';
} else {
    signIn.style.display = 'inline';
    userProfile.style.display = 'none';
}

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
    if (navbar.classList.contains('open')) {
        header.style.display = 'flex';
        header.style.alignItems = 'center';
        header.style.justifyContent = 'center';
    } else {
        header.style.display = '';
        header.style.alignItems = '';
        header.style.justifyContent = '';
    }
};

document.getElementById('menu-icon').addEventListener('click', function () {
    document.querySelector('.navbar').classList.toggle('show');
});

var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

document.addEventListener("DOMContentLoaded", function () {
    AOS.init();
});

selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));