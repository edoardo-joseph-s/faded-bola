const navbar = document.querySelector('.navbar');
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelectorAll('.nav-panel a');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        const isOpen = navbar.classList.toggle('menu-open');
        hamburger.setAttribute('aria-expanded', isOpen);
    });
}

navLinks.forEach((link) => {
    link.addEventListener('click', () => {
        navbar.classList.remove('menu-open');
        if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    });
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        navbar.classList.remove('menu-open');
        if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    }
});

document.querySelectorAll('.menu-item-has-children > a').forEach((link) => {
    link.addEventListener('click', (e) => {
        if(window.innerWidth <= 860){
            e.preventDefault();
            link.parentElement.classList.toggle('active');
        }
    });
});
