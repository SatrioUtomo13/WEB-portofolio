const navLinks = document.querySelectorAll('.nav-link');

function toggleActiveElements(activeLink) {
    navLinks.forEach(link => {
        if (link === activeLink) {
        link.classList.add('active');
        link.classList.remove('unactive');
        } else {
        link.classList.remove('active');
        link.classList.add('unactive');
        }
    });
}

navLinks.forEach(link => {
    link.addEventListener('click', function() {
        toggleActiveElements(link);
    });
});
