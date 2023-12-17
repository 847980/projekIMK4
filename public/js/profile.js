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

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
    if (navbar.classList.contains('open')) {
        header.style.display = 'flex';
        header.style.alignItems = 'center';
        header.style.justifyContent = 'center';
        header.style.backgroundColor = 'var(--text-color-light)';
        navbar.style.backgroundColor = 'var(--text-color-light)';
    } else {
        header.style.display = '';
        header.style.alignItems = '';
        header.style.justifyContent = '';
        header.style.backgroundColor = 'transparent';
        navbar.style.backgroundColor = 'transparent';
    }
};

document.getElementById('menu-icon').addEventListener('click', function () {
    document.querySelector('.navbar').classList.toggle('show');
});

document.addEventListener('DOMContentLoaded', function () {
    const detailButtons = document.querySelectorAll('.box-ongoing button');

    detailButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            const modalOverlay = document.getElementById(`modalOverlay${index + 1}`);
            modalOverlay.style.display = 'flex';
            const modal = modalOverlay.querySelector('.ticket-modal');
        });
    });

    const closeButtons = document.querySelectorAll('.modal .close');

    closeButtons.forEach((closeButton) => {
        closeButton.addEventListener('click', function () {
            const modalOverlay = this.closest('.overlay');
            modalOverlay.style.display = 'none';
        });
    });
});