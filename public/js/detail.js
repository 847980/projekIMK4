let header = document.querySelector('header');
let menu = document.querySelector('#menu-icon');
let prevScrollpos = window.scrollY;

window.addEventListener('scroll', () => {
    var currentScrollPos = window.scrollY;

    if (currentScrollPos > 50) {
        header.style.backgroundColor = 'var(--text-color-light)';
    } else {
        header.style.backgroundColor = 'transparent';
    }

    if (currentScrollPos === 0) {
        header.style.backgroundColor = 'transparent';
    }

    prevScrollpos = currentScrollPos;
});

menu.onclick = () => {
    menu.classList.toggle('bx-x');
};

document.getElementById('menu-icon').addEventListener('click', function () {
    document.querySelector('.navbar').classList.toggle('show');
});



