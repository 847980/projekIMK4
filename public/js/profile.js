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

// document.addEventListener('DOMContentLoaded', function () {
//     const editProfileBtn = document.getElementById('editProfileBtn');
//     editProfileBtn.addEventListener('click', function () {
//         const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
//         editProfileModal.show();
//     });
// });

// function closeEditProfileModal() {
//     document.getElementById('editProfileModal').style.display = 'none';
// }
