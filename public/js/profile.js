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

function openModal() {
    document.getElementById('modalOverlay').style.display = 'flex';
}

// Function to close the modal
function closeModal() {
    document.getElementById('modalOverlay').style.display = 'none';
}

// Attach click event to the button
document.getElementById('openModalBtn').addEventListener('click', openModal);