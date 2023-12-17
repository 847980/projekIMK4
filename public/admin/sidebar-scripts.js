window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            sidebarToggle.classList.toggle('active');

            const isToggled = document.body.classList.contains('sb-sidenav-toggled');
            sidebarToggle.innerHTML = isToggled ? '>>' : '<<';
            localStorage.setItem('sb|sidebar-toggle', isToggled);
        });
    }

});
