// Custom scripts for Fila Clone
document.addEventListener('DOMContentLoaded', function () {
    console.log("Fila Clone Loaded");

    // Example: Add a simple scroll effect to navbar (optional, if we want sticky to change style)
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('shadow');
        } else {
            navbar.classList.remove('shadow');
        }
    });
});
