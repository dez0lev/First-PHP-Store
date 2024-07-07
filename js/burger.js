const burger = document.querySelector('.burger');
const lines = document.querySelectorAll('.burger__line');
const header_nav = document.querySelectorAll ('.header_nav')

function toggleBurger() {
    header_nav.forEach((line) => line.classList.toggle('header_nav_active'));
    lines.forEach((line) => line.parentElement.classList.toggle('open'));
    document.body.classList.toggle('hidden');
}

burger.addEventListener('click', toggleBurger);